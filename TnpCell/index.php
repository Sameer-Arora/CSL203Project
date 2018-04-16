<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page:Internal Tnp Cell</title>

    </head>
    <body>

        <?php

        include('session.php');
       
        if(isset($_POST['person_id'])){
        	echo "<script type='text/javascript'>alert('logged');</script>";
			$_SESSION['person_id']=$_POST['person_id'];
        	$_SESSION['name']=$_POST['name'];

        }
        require 'index_main.php';

        ?>
        <script>
		$(document).ready(function () {
			$('#modal').modal('hide');
			$('#person_id').html("<?php if(isset($_SESSION['person_id'])) echo($_SESSION['name']); ?>");	
		});

		function logged(){
		}

		</script>
	</body>
</html>
<!-- 
eg3667ss9t1a4vjpk5r7gc6ao0
eg3667ss9t1a4vjpk5r7gc6ao0
 -->