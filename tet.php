<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
table, th, td {
     border: 3px solid white;
	
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
</style>
</head>
<body></body>
</html>
<?php
include"work.php";
print <<<HERE
<head>
<body>
<div>
<h2><font color="white"> REQUIREMENT</font></h2>
<form id="myform" method="post">
<div>
<label for="year">Year   :</label> 
<input type="text" class="from-control" name="year" required="required"  placeholder="year"/><br>
</div>
<div>...</div>
<div>
<label for="Gender">Gender :</label>
<input type="text" class="from-control" name="gender" required="required"  placeholder="Gender"/><br>
</div>
<div>...</div>
<div>
<label for="choice">choice :</label>
<input type="text" class="from-control" name="choice" required="required"  placeholder="Enter number"/><br>
</div>
<div>....</div>
<div id="mysubmit">
<input type="submit" name="submit" class="btn btn-primary active" value="submit">
</div>
</form>
</div>
</body>
<html>
HERE;
?>
<?php
include("conn.php");
if(isset($_POST['submit']))
{
	$Year=$_POST['year'];
	$gender=$_POST['gender'];
	$choice=$_POST['choice'];
	if($gender=='both')
	{
	$sql="SELECT * from project WHERE year ='".$Year."' and gender ='male' and position BETWEEN 0 and ".$choice." ";
	$result=@mysql_query($sql) or die(@mysql_error());
	$numrow =@mysql_num_rows($result);
	echo " Result found: ".$numrow." MALE BABIES ";
	echo "<div><table id='t01' class='table'><thread><tr><th>Rank</th><th>Name</th><th>Amount<th/></tr><thread>";
	while($res=mysql_fetch_array($result))
	{
	echo "<tr class='success'><td>" . $res["position"]. " </td><td>" . $res["given_name"]. " </td><td>" . $res["amount"]. " </td></tr>";
     }
     echo "</table></div>";
	 
	 $sql="SELECT * from project WHERE year ='".$Year."' and gender ='female' and position BETWEEN 0 AND ".$choice." ";
	$result=@mysql_query($sql) or die(@mysql_error());
	$numrow =@mysql_num_rows($result);
	echo " Result found: ".$numrow." FEMALE BABIES ";
	echo "<div><table id='t01' class='table'><thread><tr><th>Rank</th><th>Name</th><th>Amount<th/></tr><thread>";
	while($res=mysql_fetch_array($result))
	{
	echo "<tr class='success'><td>" . $res["position"]. " </td><td>" . $res["given_name"]. " </td><td>" . $res["amount"]. " </td></tr>";
     }
     echo "</table></div>";
	}
	else{
		$sql="SELECT * from project WHERE year ='".$Year."' and gender ='".$gender."' and position between 0 and ".$choice." ";
	
	$result=@mysql_query($sql) or die(@mysql_error());
	$numrow =@mysql_num_rows($result);
	echo " Result found: ".$numrow." ";
	echo "<table id='t01' class='table'><thread><tr><th>Rank</th><th>Name</th><th>Amount<th/></tr><thread>";
	while($res=mysql_fetch_array($result))
	{
	echo "<tr class='success'><td>" . $res["position"]. " </td><td>" . $res["given_name"]. " </td><td>" . $res["amount"]. " </td></tr>";
     }
     echo "</table>";
	}
}
?>

