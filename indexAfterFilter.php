<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<center>
<form action="indexAfterFilter.php" align="center">
  	<p> SORT BY: </p>
  	<select name="byYear">
	  <option value="">Your year</option> 		
	  <option value="1">1st year</option>
	  <option value="2">2nd year</option>
	  <option value="3">3rd year</option>
	  <option value="4">4th year</option>
	</select> 
  	<select name="byBranch">
	  <option value="">Branch</option>
	  <option value="cse">Computer Science</option>
	  <option value="ee">Electrical Engg.</option>
	  <option value="me">Mechanical Engg.</option>
	  <option value="ce">Civil Engg.</option>
	</select> 
	<select name="summerORwinter">
	  <option value="">Summer/Winter</option>
	  <option value="1">Summer Internship</option>
	  <option value="0">Winter Internship</option>
	</select> 
	<select name="abroadORnot">
	  <option value="">Abroad/Domestic</option>
	  <option value="1">Abroad internship</option>
	  <option value="0">Domestic internship</option>
	</select> 

  <input type="submit" value="Submit">
</form>
	</center>

 <table style="width:75%" align='center'>
  <tr>
    <th width='12.5%'>Name</th>
    <th width='12.5%'>Duration</th>
    <th width='12.5%'>Department</th>
    <th width='12.5%'>Year</th>
    <th width='12.5%'>Location</th>
    <th width='12.5%'>Summer/Winter</th>
    <th width='12.5%'>Website</th>
  </tr>
  <?php
  	include('databaseConnection.php');
  	$query = "select * from `internshipTable`";
  	$count = 0;
  	if($_GET["byBranch"] != "") {
  		$count = $count+1;
  		if($count==1) {
  			$query=$query." where";
  		}
  		else{
  			$query=$query." and";
  		}
  		$query=$query." department='".$_GET["byBranch"]."'";
  	}
  	if($_GET["byYear"] != "") {
  		$count = $count+1;
  		if($count==1) {
  			$query=$query." where";
  		}
  		else{
  			$query=$query." and";
  		}
  		$query=$query." year=".$_GET["byYear"]."";
  	}
  	if($_GET["summerORwinter"] != "") {
  		$count = $count+1;
  		if($count==1) {
  			$query=$query." where";
  		}
  		else{
  			$query=$query." and";
  		}
  		$query=$query." time=".$_GET["summerORwinter"]."";
  	}
  	if($_GET["abroadORnot"] != "") {
  		$count = $count+1;
  		if($count==1) {
  			$query=$query." where";
  		}
  		else{
  			$query=$query." and";
  		}
  		$query=$query." isAbroad='".$_GET["abroadORnot"]."'";
  	}
  	$result = mysqli_query($connection,$query);
  	while ($row = $result->fetch_assoc()) {
  		$name = $row['name'];
  		$duration = $row['duration'];
  		$department = $row['department'];
  		$year = $row['year'];
  		$place = $row['place'];
  		$time = $row['time'];
  		$website = $row['website'];
  		if($duration=='1')	$duration = $duration." month";
  		else $duration = $duration." months";
  		if($year=='1')	$year = $year."st year";
  		else if($year=='2')	$year = $year."nd year";
  		else if($year=='3')	$year = $year."rd year";
  		else if($year=='4')	$year = $year."th year";
  		if($time=='1')	$time = "Summer";
  		elseif($time=='0')	$time = "Winter";
		 echo "<table border='4' class='stats' cellspacing='0' width='75%' align='center'>

            <tr>
            </tr>";

              echo "<tr>";
              echo "<td width='12.5%'>" . $name . "</td>";
              echo "<td width='12.5%'>" . $duration . "</td>";
              echo "<td width='12.5%'>" . $department . "</td>";
              echo "<td width='12.5%'>" . $year . "</td>";
              echo "<td width='12.5%'>" . $place . "</td>";
              echo "<td width='12.5%'>" . $time . "</td>";
              echo "<td width='12.5%'>" . $website . "</td>";

              echo "</tr>";

    echo "</table>";
	}
  ?>
</table> 
</body>
</html>
