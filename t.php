<?php 
include"conn.php";
if(isset($_POST['search']))
{
$search=$_POST['search'];
$sql="SELECT * from project WHERE given_name = ' " .@mysql_real_escape_string( $_GET['search'] )."'";
$result=@mysql_query($sql) or die(@mysql_error());
$number =@mysql_num_rows($result);
echo ".$number.";
include"work.php";
print <<< HERE
<h2>SEARCH RESULT</h2>
<h3>$number RESULTS FOUND $search</h3> 
<table cellpadding="15">
HERE;
while($row=@mysql_fetch_array($result))
{
     echo "id: " . $row["given_name"]. "<br>";
    
}
}
?>
