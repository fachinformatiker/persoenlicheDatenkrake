<?php
	$isDebug = true;
	require 'db_connect.php';
	$date = htmlspecialchars($_POST["date"]);

	function outputDebugMessage($output, $with_script_tags = true) {
		global $isDebug;
		if ($isDebug == true) {
			$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .  ');';
			if ($with_script_tags) {
				$js_code = '<script>' . $js_code . '</script>';
			}
			echo $js_code;
		} else { echo "a"; }
	}

	$result_health = mysqli_query($conn, "SELECT * FROM health WHERE DATE = '$date'");
	$result_journal = mysqli_query($conn, "SELECT * FROM journal WHERE DATE = '$date'");
	$result_corona = mysqli_query($conn, "SELECT * FROM CWA WHERE DATE = '$date'");

	if (mysqli_num_rows($result_health) > 0) { $isHealthData = true; } else { $isHealthData = false; }
	if (mysqli_num_rows($result_corona) > 0) { $isCoronaData = true; } else { $isCoronaData = false; }
	if (mysqli_num_rows($result_journal) > 0) { $isJournalData = true; } else { $isJournalData = false; }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title> My personal Data </title>
		<?php
			if ($isHealthData == false) { echo "<style>div.healthdata { display: none; }</style>"; } else { echo "<style>div.healthdata { text-align: center; }</style>"; }
			if ($isCoronaData == false) { echo "<style>div.coronadata { display: none; }</style>"; } else { echo "<style>div.coronadata { text-align: center; }</style>"; }
			if ($isJournalData == false) { echo "<style>div.journaldata { display: none; }</style>"; } else { echo "<style>div.journaldata { text-align: center }</style>"; }
		?>
	</head>
	<body>
		<center>
			<form method="post">
				<input type="date" name="date" id="date">
				<button type="submit">get data</button>
			</form>
		</center>

		<?php
			if ($date > 0) {
				if ($isHealthData == true) {
					// output data of each row
					while($row_health = mysqli_fetch_assoc($result_health)) {
						$date = $row_health["Date"];
						$weight = $row_health["Weight"];
						$bmi = $row_health["BMI"];
						$bodyFatPercentage = $row_health["BodyFatPercentage"];
						$leanBodyMass = $row_health["LeanBodyMass"];
						$deficit = $row_health["RestingEnergy"] + $row_health["ActiveEnergy"] - $row_health["DietaryEnergy"];
						$restingEnergy = $row_health["RestingEnergy"];
						$activeEnergy = $row_health["ActiveEnergy"];
						$dietaryEnergy = $row_health["DietaryEnergy"];
						$carbs = $row_health["Carbs"];
						$protein = $row_health["Protein"];
						$totalFat = $row_health["TotalFat"];
						$steps = $row_health["Steps"];
						$sportday = $row_health["SportDay"];
					}
				} else { outputDebugMessage("no health data for this day"); }
				if ($isJournalData == true) {
					// output data of each row
					while($row_journal = mysqli_fetch_assoc($result_journal)) {
						$subject = $row_journal["subject"];
						$text = $row_journal["text"];
						$mood = $row_journal["mood"];
					}
				} else { outputDebugMessage("no journal data for this day"); }
				if ($isCoronaData == true) {
					// output data of each row
					while($row_corona = mysqli_fetch_assoc($result_corona)) {
						$exchangedKeys = $row_corona["ExchangedKeys"];
						$status = $row_corona["Status"];
						$exposures = $row_corona["Exposures"];
						$test = $row_corona["Test"];
						$riskday = $row_corona["Riskday"];
					}
				} else { outputDebugMessage("no corona data for this day"); }
			} else {
				outputDebugMessage("no date provided");
				echo "please choose a day";
			}
		?>

		<div class="journaldata">
			<?php
				echo "<h1>".$subject."</h1>";
				echo "<p>".$text."</p><br><hr>";
			?>
		</div>
		<div class="healthdata">
			<?php
				echo "<h1>Health</h1>";
				echo "weight: ".$weight."kg<br>";
				echo "body fat percentage: ".$bodyFatPercentage."%<br>";
				echo "bmi: ".$bmi."<br>";
				echo "lean body mass: ".$leanBodyMass."kg<br>";
				echo "active energy: ".$activeEnergy." kcal<br>";
				echo "resting energy: ".$restingEnergy." kcal<br>";
				echo "dietary energy: ".$dietaryEnergy." kcal<br>";
				echo "deficit: ".$deficit." kcal<br>";
				echo "carbs: ".$carbs."g<br>";
				echo "protein: ".$protein."g<br>";
				echo "total fat: ".$totalFat."g<br>";
				if ($sportday == "x") {
					echo "steps: ".$steps."<br>";
					echo "sport day<br><hr>";
				} else { echo "steps: ".$steps."<br><br><hr>"; }
			?>
		</div>
		<div class="coronadata">
			<?php
				echo "<h1>Corona</h1>";
				echo "status: ".$status."<br>";
				echo "riskday: ".$riskday."<br>";
				echo "exposures: ".$exposures."<br>";
				echo "test: ".$test."<br>";
				echo "exchanged keys: ".$exchangedKeys."<br><br><hr>";
			?>
		</div>

	</body>
</html>

<?php require 'db_close.php'; ?>

