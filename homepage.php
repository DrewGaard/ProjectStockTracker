<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Project Stock Trader</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">

	<div id="main-wrapper">
	<center>
		<h2>Project Stock Trader</h2>
		<img src="imgs/logo.png" class="avatar"/>
		
		<p>Welcome to project stock trader <?php echo $_SESSION['username']?>. You can either enter a ticker symbol into the first search box to see results on the website, or enter a symbol and your email address to have the latest available information about the selected stock to your email address.</p>
	</center>
	
	  <center>
	  <form action="api.php" method="get">
	  <fieldset>
	  Enter a stock symbol: <input type="text" name="query" /> <br />
	  <input type="submit" value="Search" />
	 
	  
	  </form> 
	  <p>Enter a stock symbol and your email to have the latest available data sent to your email (check your spam folder).</p>
	  <form action="email.php" method="post"> 
	  Enter a stock symbol: <input type="text" name="query" /> <br />
	  <label for="email">Email:</label>
    <input type="text" name="email" id="email" /><br />
	   <input onclick="add()" type="submit" value="Track It!" />
	   </fieldset>
	  </form>
	  
	  <div id="symlist"></div>
	  
	  
	 
			
		<script src="http://widgets.macroaxis.com/widgets/url.jsp?t=42"></script>

	  
	  </center>
	  
	  
	  
	
	<form class="myform" action="homepage.php" method="post">

		<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>

	</form>
	
	<?php
		if(isset($_POST['logout']))
		{
			session_destroy();
			header('location:index.php');
		}
	?>
	
	</div>
	
</body>
</html>

<script>




function add()
{
	var text = document.getElementById("stock").value;
	var div = document.getElementById('symlist');
	var newParagraph = document.createElement('p');

	div.innerHTML = div.innerHTML + text + '\n';
}
</script>