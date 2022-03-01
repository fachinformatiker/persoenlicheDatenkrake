<?php
	include 'header.php';
	require 'db_connect.php';

	$id_array = $date_array = $weight_array = $bodyfatpercentage_array = $bmi_array = $leanbodymass_array = $activeenergy_array = $restingenergy_array = $dietaryenergy_array = $deficit_array = $protein_array = $carbs_array = $fat_array = $sportday_array = array();

	$result = $conn->query("SELECT * FROM health");
	foreach($result as $row) {

		array_push($id_array, $row["ID"]);
		array_push($date_array, $row["Date"]);
		array_push($weight_array, $row["Weight"]);
		array_push($bodyfatpercentage_array, $row["BodyFatPercentage"]);
		array_push($bmi_array, $row["BMI"]);
		array_push($leanbodymass_array, $row["LeanBodyMass"]);
		array_push($activeenergy_array, $row["ActiveEnergy"]);
		array_push($restingenergy_array, $row["RestingEnergy"]);
		array_push($dietaryenergy_array, $row["DietaryEnergy"]);
		$deficit = $row["ActiveEnergy"] + $row["RestingEnergy"] - $row["DietaryEnergy"];
		array_push($deficit_array, $deficit);
		array_push($protein_array, $row["Protein"]);
		array_push($carbs_array, $row["Carbs"]);
		array_push($fat_array, $row["TotalFat"]);
		array_push($sportday_array, $row["SportDay"]);
	}
?>

<center>
<br/>
<!-- Just so that JSFiddle's Result label doesn't overlap the Chart -->
<div id="chartContainer" style="height: 300px; width: 750px;"></div>
<table>
<tr>
<th>Date</th>
<th>Weight (kg)</th>
<th>BMI</th>
<th>Body Fat Percentage</th>
<th>Lean Body Mass (kg)</th>
<th>Resting Energy (kcal)</th>
<th>Active Energy (kcal)</th>
<th>Dietary Energy (kcal)</th>
<th>Deficit</th>
<th>Protein (g)</th>
<th>Carbs (g)</th>
<th>Fat (g)</th>
<th></th>
</tr>

<?php
$id_now = 0;
$id_count = count($id_array);
while($id_now < $id_count) {
	print "<td>".$date_array[$id_now]."</td>";
	print "<td><center>".$weight_array[$id_now]."</center></td>";
	print "<td><center>".$bmi_array[$id_now]."</center></td>";
	print "<td><center>".$bodyfatpercentage_array[$id_now]."</center></td>";
	print "<td><center>".$leanbodymass_array[$id_now]."</center></td>";
	print "<td><center>".$restingenergy_array[$id_now]."</center></td>";
	print "<td><center>".$activeenergy_array[$id_now]."</center></td>";
	print "<td><center>".$dietaryenergy_array[$id_now]."</center></td>";
	print "<td><center>".$deficit_array[$id_now]."</center></td>";
	print "<td><center>".$protein_array[$id_now]."</center></td>";
	print "<td><center>".$carbs_array[$id_now]."</center></td>";
	print "<td><center>".$fat_array[$id_now]."</center></td>";
	print "<td><center>".$sportday_array[$id_now]."</center></td></tr>";
	$id_now++;
}
?>

</table>
<center>
<br>

<?php
	require 'db_close.php';
	include 'footer.php';
?>
