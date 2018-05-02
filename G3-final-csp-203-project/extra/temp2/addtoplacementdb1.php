<?php
                        include('databaseConnection.php');
                        $query = "insert into placementTable values(" . $_GET[hidAbroadORnot] . ",'" . $_GET[hidName] . "','". $_GET[hidBranch] . "','". $_GET[hidPlace] . "','". $_GET[hidWebsite] . "')";
                        $query2 = "select * from placementTable where isAbroad=" . $_GET[hidAbroadORnot] . " and name='" .$_GET[hidName] . "' and place='" .$_GET[hidPlace] . "' and website='" .$_GET[hidWebsite] . "' and department='" .$_GET[hidBranch] . "'";
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

redirect("addtoplacementdb.php")
            ?>