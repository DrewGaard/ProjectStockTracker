<?php
	//$stocksym = $_POST['query'];
	
	if (!empty($_POST))
	{
        $stocksym = $_POST['query'];
	}
	
	//$stocksym = "AMD";

	$json_string = "https://www.quandl.com/api/v3/datasets/WIKI/$stocksym.json?api_key=ANKEmEKEurhaduKMyG5E";
	$jsondata = file_get_contents($json_string);
	$obj = json_decode($jsondata);
	
	
	$stockName = ($obj->dataset->name);
	
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


    $email=$_POST['email'];
    $subject = 'Thank you for using Project Stock Tracker';
    $message = 'The stock information was last updated on ' . $date . '. The open price that day was ' . $open .'. The high was ' . $high . '. The low was ' . $low . '. The close price was ' . $close . '. Visit us again at https://projectstocktracker.000webhostapp.com/';
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: Project Stock Tracker Admin <tracker@projectstocktracker.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

    mail($email, $subject, $message, $headers);
	
	echo '<script type="text/javascript"> alert("Stock information set!") </script>';
	
	header("Location: homepage.php");
?>