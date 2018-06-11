<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Results</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<center>
<div id="main-wrapper">
<body style="background-color:#bdc3c7">
  <h1>Stock Look-Up Results</h1>
  
  <?php
	$stocksym = $_GET["query"];

	$json_string = "https://www.quandl.com/api/v3/datasets/WIKI/$stocksym.json?api_key=ANKEmEKEurhaduKMyG5E";
	$jsondata = file_get_contents($json_string);
	$obj = json_decode($jsondata);
	
	
	$stockName = ($obj->dataset->name);
	print "<center>$stockName</center>";
	
	$dataArray = ($obj->dataset->data);
	
	
	$dayArray = $dataArray['0'];
	
	$date = $dayArray['0'];
	$open = $dayArray['1'];
	$high = $dayArray['2'];
	$low = $dayArray['3'];
	$close = $dayArray['4'];
	$volume = $dayArray['5'];
	$exdividend = $dayArray['6'];
	$splitratio = $dayArray['7'];
	$adjopen = $dayArray['8'];
	$adjhigh = $dayArray['9'];
	$adjlow = $dayArray['10'];
	$adjclose = $dayArray['11'];
	$adjvolume = $dayArray['12'];
	
	
	print_r ("<center><br>Date: $date</center>");
	print_r ("<center><br>Open: $open</center>");
	print_r ("<center><br>High: $high</center>");
	print_r ("<center><br>Low: $low</center>");
	print_r ("<center><br>Close: $close</center>");
	print_r ("<center><br>Volume: $volume</center>");
	print_r ("<center><br>Ex-Dividend: $exdividend</center>");
	print_r ("<center><br>Split Ratio: $splitratio</center>");
	print_r ("<center><br>Adjusted Open: $adjopen</center>");
	print_r ("<center><br>Adjusted High: $adjhigh</center>");
	print_r ("<center><br>Adjusted Low: $adjlow</center>");
	print_r ("<center><br>Adjusted Close: $adjclose</center>");
	print_r ("<center><br>Adjusted Volume: $adjvolume</center>");
?>

  
<h1><a href="https://projectstocktracker.000webhostapp.com/homepage.php">Back</a></h1>

</body>
</div>

</center>

</html>

