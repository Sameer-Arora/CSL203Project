<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page:Internal Tnp Cell</title>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

		<!-- jQuery UI Widget and Effects Core (custom download)
			 You can make your own at: http://jqueryui.com/download -->
		<script src="./js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
			
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   
    </head>
    <body>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content" >
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel" style="font-weight: 10px, text-align:center " >OOPS!!</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="color: red">
            Error Occurred:<?php if(isset($_GET['message'])) echo $_GET['message'];?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
        <?php

        require 'login.html';
       
        ?>


    <script>
        $(document).ready(function () {

            <?php if(!isset($_GET['message'])): ?>
                $('#modal').modal('hide');
            <?php else: ?>
                $('#modal').modal('show');
            <?php endif; ?>

        });

    </script>    
    </body>
</html>
