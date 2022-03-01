<?php
	$isDebug = true;
	require 'script/functions.php';
	require 'script/db_connect.php';
	require 'script/get_data.php';
	require 'header.php';
?>

<center>
	<form method="post">
		<input type="date" name="date" id="date">
		<button type="submit">get data</button>
	</form>
</center>

<div class="journaldata">
	<?php
		echo "<h1>".$subject."</h1>";
		echo "<p>".$text."</p><br>";
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
		} else { echo "steps: ".$steps."<br>"; }
	?>
</div>

<div class="coronadata">
	<?php
		echo "<h1>Corona</h1>";
		echo "status: ".$status."<br>";
		echo "riskday: ".$riskday."<br>";
		echo "exposures: ".$exposures."<br>";
		echo "test: ".$test."<br>";
		echo "exchanged keys: ".$exchangedKeys."<br>";
	?>
</div>

<?php
	require 'script/db_close.php';
	require 'footer.php';
?>

