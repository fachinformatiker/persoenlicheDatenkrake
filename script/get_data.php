<?php
	$date = htmlspecialchars($_POST["date"]);

	$result_health = mysqli_query($conn, "SELECT * FROM health WHERE DATE = '$date'");
	$result_journal = mysqli_query($conn, "SELECT * FROM journal WHERE DATE = '$date'");
	$result_corona = mysqli_query($conn, "SELECT * FROM CWA WHERE DATE = '$date'");

	if (mysqli_num_rows($result_health) > 0) { $isHealthData = true; } else { $isHealthData = false; }
	if (mysqli_num_rows($result_corona) > 0) { $isCoronaData = true; } else { $isCoronaData = false; }
	if (mysqli_num_rows($result_journal) > 0) { $isJournalData = true; } else { $isJournalData = false; }

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
		$noData = true;
	}
?>
