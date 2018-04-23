

<div>
        <div class="containerakshat" style="margin-top:200px;margin-bottom:200px;">
            <div class="rowakshat">
<div id='formakshat'><center>
                <form action="add.php" method="get" id="formakshat">
                    <input type="text" name="idName" placeholder="Enter your name">
                    <input type="text" name="idYear" placeholder="Year of Passing">
                        
                        <select name="idBranch">
                          <option value="">--Department--</option>
                          <option value="CSE">Computer Science and Engineering</option>
                          <option value="EE">Electrical Engineering</option>
                          <option value="ME">Mechanical Engineering</option>
                          <option value="CE">Civil Engineering</option>
                        </select>
                        <input type="text" name="idEmail" placeholder="Email">
                        <input type="text" name="idCompany" placeholder="Company">
                        <input type="text" name="idPost" placeholder="Post">
                       <input type="text" name="idAddress" placeholder="Address">
                        
                        <input type="text" name="idPhone" placeholder="Contact Number">
                  
                    <input type="submit" value="Submit">
                </form>
            </center>
            <?php
                        include('connect.php');
                        $query = "insert into alumni values('" . $_GET['idName'] . "','" . $_GET['idBranch'] . "'," . $_GET['idYear'] . ",'" . $_GET['idEmail'] . "','" . $_GET['idCompany'] . "','" . $_GET['idPost'] . "','" . $_GET['idAddress'] ."','" . $_GET['idPhone']. "')";
                        /*$query2 = "select * from alumni where isAbroad=" . $_GET[hidAbroadORnot] . " and name='" .$_GET[hidName] . "' and duration=" .$_GET[hidMonth] . " and year=" .$_GET[hidYear] . " and place='" .$_GET[hidPlace] . "' and time=" .$_GET[hidSummerORwinter] . " and website='" .$_GET[hidWebsite] . "' and department='" .$_GET[hidBranch] . "'";
                        $result2 = mysqli_query($conn,$query2);
                        if (mysqli_num_rows($result2)!=0){
                            echo "<script type='text/javascript'>alert('This entry already exists')</script>";
                        } 
                        else{
                            $result = mysqli_query($connection,$query);
                            if($_GET){
                            if( $result ) 
                                echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                            else
                                echo "<script type='text/javascript'>alert('failed!')</script>";
                            }
                        }*/
                        $result = mysqli_query($conn,$query);
            ?>
    </div>
</div>
</div>
</div>