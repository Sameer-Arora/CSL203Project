
        <?php

        include('session.php');
        include 'header.php';
       
        if(isset($_POST['person_id'])){
		$_SESSION['person_id']=$_POST['person_id'];
        	$_SESSION['name']=$_POST['name'];

        }




			include 'index.html';
			include 'footer.php';

        ?>


