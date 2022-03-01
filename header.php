<!DOCTYPE html>
	<html lang="en">
	<head>
		<script> console.time("pageLoad"); </script>
		<title>My personal Data</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
		<link rel="manifest" href="/favicon/site.webmanifest">
		<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#000000">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<script src="canvasjs.min.js"></script>
		<script src="jquery-3.6.0.min.js"></script>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<?php
			if ($isHealthData == false) { echo "<style>div.healthdata { display: none; }</style>"; } else { echo "<style>div.healthdata { text-align: center; }</style>"; }
			if ($isCoronaData == false) { echo "<style>div.coronadata { display: none; }</style>"; } else { echo "<style>div.coronadata { text-align: center; }</style>"; }
			if ($isJournalData == false) { echo "<style>div.journaldata { display: none; }</style>"; } else { echo "<style>div.journaldata { text-align: center }</style>"; }
		?>
	</head>
	<body>
