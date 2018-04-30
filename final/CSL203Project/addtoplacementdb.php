<?php
include 'session.php';
include 'header_sahil.php';
?>

    <link rel="stylesheet" href="formsahil.css">


<div id="fh5co-core-feature" style="width:100%;">
    <div class="container" style="width:100%;">
      <div class="row" style="width:100%;">
<div id='formsahil2'><center>
                <form action="addtoplacementdb1.php" method="GET" id="formsahil" name="Form">
                    <input type="text" name="hidName" placeholder="Placement's name.." value="" required>
                        
                        <select name="hidBranch" value="" required>
                          <option value="">--Branch--</option>
                          <option value="cse">Computer Science</option>
                          <option value="ee">Electrical Engg.</option>
                          <option value="me">Mechanical Engg.</option>
                          <option value="ce">Civil Engg.</option>
                        </select>
                        
                       <input type="text" name="hidPlace" placeholder="Location..."  value="" required>
                        <select name="hidAbroadORnot" value="" required>
                          <option value="">--Abroad/Domestic--</option>
                          <option value="1">Abroad placement</option>
                          <option value="0">Domestic placement</option>
                        </select>
                        <input type="text" name="hidWebsite" placeholder="website link..." value="" required>
                  
                    <div class="form-group" >
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