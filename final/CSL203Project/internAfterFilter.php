<?php

include 'session.php';

include 'header_sahil.php';
?>





<div id="fh5co-core-feature" style="width:100%;">
    <div class="container" style="width:100%;">
      <div class="row" style="width:100%;">
                    <center>
                    <form action="internAfterFilter.php" align="center" style="margin-bottom:10px;">
                          <!--<p> SORT BY: </p>-->
                          <div id="search_categories">
                        <select name="byYear">
                          <option value="">--Year--</option>        
                          <option value="1">1st year</option>
                          <option value="2">2nd year</option>
                          <option value="3">3rd year</option>
                          <option value="4">4th year</option>
                        </select>
                        <select name="byMonth">
                          <option value="">--Duration--</option>        
                          <option value="1">1 month</option>
                          <option value="2">2 months</option>
                          <option value="3">3 months</option>
                          <option value="4">4 months</option>
                        </select>
                          <select name="byBranch">
                          <option value="">--Branch--</option>
                          <option value="cse">Computer Science</option>
                          <option value="ee">Electrical Engg.</option>
                          <option value="me">Mechanical Engg.</option>
                          <option value="ce">Civil Engg.</option>
                        </select>
                        <select name="summerORwinter">
                          <option value="">--Summer/Winter--</option>
                          <option value="1">Summer Internship</option>
                          <option value="0">Winter Internship</option>
                        </select>
                        <select name="abroadORnot">
                          <option value="">--Abroad/Domestic--</option>
                          <option value="1">Abroad internship</option>
                          <option value="0">Domestic internship</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-default" style="margin-top:20px;margin-bottom:20px;">Submit</button>
                    </form>
                        
                     <table id="sahilTable" width="80%">
                       
                      <tr>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Location</th>
                        <th>Summer/Winter</th>
                        <th>Website</th>
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
    if($_GET["byMonth"] != "") {
      $count = $count+1;
      if($count==1) {
        $query=$query." where";
      }
      else{
        $query=$query." and";
      }
      $query=$query." duration='".$_GET["byMonth"]."'";
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
      if($duration=='1')  $duration = $duration." month";
      else $duration = $duration." months";
      if($year=='1')  $year = $year."st year";
      else if($year=='2') $year = $year."nd year";
      else if($year=='3') $year = $year."rd year";
      else if($year=='4') $year = $year."th year";
      if($time=='1')  $time = "Summer";
      elseif($time=='0')  $time = "Winter";
                        echo "<tr>";
                        echo "<td class='tg-yw4l'>" . $name . "</td>";
                        echo "<td class='tg-yw4l'>" . $duration . "</td>";
                        echo "<td class='tg-yw4l'>" . $department . "</td>";
                        echo "<td class='tg-yw4l'>" . $year . "</td>";
                        echo "<td class='tg-yw4l'>" . $place . "</td>";
                        echo "<td class='tg-yw4l'>" . $time . "</td>";
                        echo "<td><a href='" . $website . "'>" . $website . "</a></td>";

                        echo "</tr>";
  }
                      ?>
                    </table>
                </center>
                <center>
                  <h3 style='margin-top:20px;'>Got an internship detail?</h3>
                  <a href='addtodb.php' style="font-size:25px;">click here</a>
                </center>
            </div>
        </div>
</div>

<?php
include 'footer.php';
?>