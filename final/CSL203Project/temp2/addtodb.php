<?php
include 'session.php';

include 'header_sahil.php';
?>


    <link rel="stylesheet" href="formsahil.css">



<div id="fh5co-core-feature" style="width:100%;">
    <div class="container" style="width:100%;">
      <div class="row" style="width:100%;">
<div id='formsahil2'><center>
                <form action="addtodb1.php" method="GET" id="formsahil" name="Form">
                    <input type="text" name="hidName" placeholder="Internship's name.." value="" required>
                        
                        <select name="hidYear" value="" required>
                          <option value="">--Year--</option>        
                          <option value="1">1st year</option>
                          <option value="2">2nd year</option>
                          <option value="3">3rd year</option>
                          <option value="4">4th year</option>
                        </select>
                        <select name="hidBranch" value="" required>
                          <option value="">--Branch--</option>
                          <option value="cse">Computer Science</option>
                          <option value="ee">Electrical Engg.</option>
                          <option value="me">Mechanical Engg.</option>
                          <option value="ce">Civil Engg.</option>
                        </select>
                        <select name="hidMonth" value="" required>
                          <option value="">--Duration--</option>        
                          <option value="1">1 month</option>
                          <option value="2">2 months</option>
                          <option value="3">3 months</option>
                          <option value="4">4 months</option>
                        </select>
                        <select name="hidSummerORwinter" value="" required>
                          <option value="">--Summer/Winter--</option>
                          <option value="1">Summer Internship</option>
                          <option value="0">Winter Internship</option>
                        </select>
                       <input type="text" name="hidPlace" placeholder="Location..."  value="" required>
                        <select name="hidAbroadORnot" value="" required>
                          <option value="">--Abroad/Domestic--</option>
                          <option value="1">Abroad internship</option>
                          <option value="0">Domestic internship</option>
                        </select>
                        <input type="text" name="hidWebsite" placeholder="website link..." value="" required>
                  
                    <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </center>

            
    </div>
</div>
</div>
</div>



<?php
include 'footer.php';
?>