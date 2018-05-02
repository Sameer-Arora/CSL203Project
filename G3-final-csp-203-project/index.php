
        <?php

        include('session.php');
   
        if(isset($_POST['person_id'])){
		$_SESSION['person_id']=$_POST['person_id'];
        	$_SESSION['name']=$_POST['name'];
        }

        include 'header.php';


	include 'index.html';
	include 'footer.php';

        ?>


