<?php
include"work.php";
print <<<HERE
<h2> REQUIREMENT </h2>
<form id="my form" method="post">
<div>
<label for="year">Year:</label>
<input type="text" name="year" required="required">
</div>
<div>
<label for="name">Name:</label>
<input type="text" name="name" required="required">
</div>
<div id="my submit">
<input type="submit" name="submit" value="submit">
</div>
</form>
HERE;
?>
<?php
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $year=$_POST['year'];
include"conn.php";

$sth = @mysql_query("SELECT * FROM project WHERE given_name='$name' AND year BETWEEN '$year' AND '1952' ");


$rows = array();
$flag = true;
$table = array();
$table['cols'] = array(

   

    array('label' => 'year', 'type' => 'string'),
    array('label' => 'amount', 'type' => 'number')

);

$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    
    $temp[] = array('v' => (string) $r['year']); 

   
    $temp[] = array('v' => (int) $r['amount']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);

}
?>

<html>
  <head>
   
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

   
    google.load('visualization', '1', {'packages':['corechart']});

  
    google.setOnLoadCallback(drawChart);

    function drawChart() {

    
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'My Weekly Plan',
          is3D: 'true',
          width: 800,
          height: 600
        };
     
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>

    <div id="chart_div"></div>
  </body>
</html>
