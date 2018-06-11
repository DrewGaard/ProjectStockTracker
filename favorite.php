<?php
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
{
 echo 'Not Connected To Server';
}
if (!mysqli_select_db ($con,'samplelogindb'))
{
 echo 'Database Not Selected';
}

$sym = $_POST['query'];



$sql = "insert into fav (api) values ('$sym')";

if (!mysqli_query($con,$sql))
{
 echo 'Not Inserted';
}

else
{
 echo 'Inserted Successfully';
}

$query = "SELECT * FROM fav"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['api'] . "</td></tr>";  //$row['index'] the index here is a field name
}

header("refresh:2; url=homepage.php");


?>?