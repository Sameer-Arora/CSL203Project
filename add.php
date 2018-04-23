

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
                       
                        $result = mysqli_query($conn,$query);
            ?>
    </div>
</div>
</div>
</div>