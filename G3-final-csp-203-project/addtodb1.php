<?php
                        include('databaseConnection.php');

                        $query = "insert into internshipTable values(" . $_GET['hidAbroadORnot'] . ",'" . $_GET['hidName'] . "'," . $_GET['hidMonth'] . ",'" . $_GET['hidBranch'] . "'," . $_GET['hidYear'] . ",'" . $_GET['hidPlace'] . "'," . $_GET['hidSummerORwinter'] . ",'" . $_GET['hidWebsite'] . "')";
                        $query2 = "select * from internshipTable where isAbroad=" . $_GET['hidAbroadORnot'] . " and name='" .$_GET['hidName'] . "' and duration=" .$_GET['hidMonth'] . " and year=" .$_GET['hidYear'] . " and place='" .$_GET['hidPlace'] . "' and time=" .$_GET['hidSummerORwinter'] . " and website='" .$_GET['hidWebsite'] . "' and department='" .$_GET['hidBranch'] . "'";
                        $result2 = mysqli_query($connection,$query2);
                        if (mysqli_num_rows($result2)!=0){
                            echo "<script type='text/javascript'>alert('This entry already exists')</script>";
                        } 
                        else{
                            $result = mysqli_query($connection,$query);
                            if($_GET){
                            if( $result ) 
                                echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                            else
                                echo "<script type='text/javascript'>alert('failed! some fields are empty')</script>";
                            }
                        }
            function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("addtodb.php")          
            ?>
