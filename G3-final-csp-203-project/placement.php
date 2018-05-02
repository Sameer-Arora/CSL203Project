<?php
include 'session.php';
include 'header_sahil.php';
?>



<div id="fh5co-core-feature" style="width:100%;">
        <div class="container" style="width:100%;">
            <div class="row" style="width:100%;">
                <center>
                    <form action="placementAfterFilter.php" align="center" method="POST" style="margin-bottom:10px;">
                          <!--<p> SORT BY: </p>-->
                          <div id="search_categories">
                            
                          <select name="byBranch">
                          <option value="">--Branch--</option>
                          <option value="cse">Computer Science</option>
                          <option value="ee">Electrical Engg.</option>
                          <option value="me">Mechanical Engg.</option>
                          <option value="ce">Civil Engg.</option>
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
                        <th>Department</th>
                        <th>Location</th>
                        <th>Website</th>
                      </tr>
                      <?php
                          include('databaseConnection.php');
                          
                            
                              $result = mysqli_query($connection,"select * from `placementTable`");
                              while ($row = $result->fetch_assoc()) {
                                  $name = $row['name'];
                                  $department = $row['department'];
                                  $place = $row['place'];
                                  $website = $row['website'];
                                  
                               

                                      echo "<tr>";
                                      echo "<td>" . $name . "</td>";
                                      echo "<td>" . $department . "</td>";
                                      echo "<td>" . $place . "</td>";
                                      echo "<td><a href='" . $website . "'>" . $website . "</a></td>";
                                      echo "</tr>";

                          
                            }
                          
                        
                      ?>
                    </table>
                </center>
                <center>
                  <h3 style='margin-top:20px;'>Got a placement detail?</h3>
                  <a href='addtoplacementdb.php' style="font-size:25px;">click here to add</a>
                </center>
            </div>
        </div>
    </div>

                    






<div id="fh5co-servicessahil" class="fh5co-bg-sectionsahil">
        <div class="containersahil" style="margin-top:200px;margin-bottom:200px;">
            <div class="rowsahil" >
                    
            </div>
        </div>
</div>







<?php
include 'footer.php';
?>
