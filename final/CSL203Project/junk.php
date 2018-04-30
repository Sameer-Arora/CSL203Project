<!-- <!DOCTYPE HTML>
<html>
	<head>
	<title>TnP &mdash; Student Portal</title>

	</head>

	<body> -->






		<script src="https://code.jquery.com/jquery-3.0.0.js"></script>

		<script>
			// The rel attribute is the userID you would want to follow


			$('body').on('click', '.followButton', function(e){

				// console.log("click")
			    e.preventDefault();
			    $button = $(this);

			    // $button.addClass('following');
			    // $button.text('Following');

				// $button.hasClass('following')


			    if($button.hasClass('following')){
			        
			        //$.ajax(); Do Unfollow

			        	$.ajax({
						    url: "follow2.php",
						    type: 'POST',
						    // data: formData,
						    success: function (data) {
						      alert(data);
						    },
						    error: function (data) {
						                    //alert("error");
						                    alert(data);
						                    //Callback("Error getting the data");
						                  },    
						    // cache: false,
						    // contentType: false,
						    // processData: false

						  });

			        $button.removeClass('following');
			        $button.removeClass('unfollow');
			        $button.text('Follow');

			          


			    } else {
			        
			        // $.ajax(); Do Follow


			        $.ajax({
						    url: "follow1.php",
						    type: 'POST',
						    // data: formData,
						    success: function (data) {
						      alert(data);
						    },
						    error: function (data) {
						                    //alert("error");
						                    alert(data);
						                    //Callback("Error getting the data");
						                  },    
						    // cache: false,
						    // contentType: false,
						    // processData: false

						  });


			        
			        $button.addClass('following');
			        $button.text('Following');
			    }
			});

			$('button.followButton').hover(function(){
			     $button = $(this);
			    if($button.hasClass('following')){
			        $button.addClass('unfollow');
			        $button.text('Unfollow');
			    }
			}, function(){
			    if($button.hasClass('following')){
			        $button.removeClass('unfollow');
			        $button.text('Following');
			    }
			});

		</script>



		<style>

		body {
		    background: #fafafa;
		}
		.container {
		    margin: 20px;
		}


		.btn {
		    cursor:pointer;
		    -moz-border-radius: 5px;
		    -webkit-border-radius: 5px;
		    border-radius: 5px;
		    
		    border:1px solid #a6a6a6;
		    border-top-color:#bdbdbd;
		    border-bottom-color:#8b8a8b;
		    
		    padding:9px 14px 9px;
		    
		    color:#666666;
		    font-size:11px;
		    background-position:0px 0px;
		    
		    text-shadow: 0 1px 0 #fff;
		    font-weight:bold;
		    
		    background-color: #ffffff;
		    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#e8e8e8)); /* Saf4+, Chrome */
		    background-image: -webkit-linear-gradient(top, #ffffff, #e8e8e8); /* Chrome 10+, Saf5.1+, iOS 5+ */
		    background-image:    -moz-linear-gradient(top, #ffffff, #e8e8e8); /* FF3.6 */
		    background-image:     -ms-linear-gradient(top, #ffffff, #e8e8e8); /* IE10 */
		    background-image:      -o-linear-gradient(top, #ffffff, #e8e8e8); /* Opera 11.10+ */
		    background-image:         linear-gradient(top, #ffffff, #e8e8e8);
		    
		    -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.2);
		    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.2);
		    box-shadow: 0 1px 1px rgba(0,0,0,0.2);
		    
		    
		}

		.btn:hover {
		    color:#333;
		    border-color:#999;
		    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#f6f6f6)); /* Saf4+, Chrome */
		    background-image: -webkit-linear-gradient(top, #ffffff, #f6f6f6); /* Chrome 10+, Saf5.1+, iOS 5+ */
		    background-image:    -moz-linear-gradient(top, #ffffff, #f6f6f6); /* FF3.6 */
		    background-image:     -ms-linear-gradient(top, #ffffff, #f6f6f6); /* IE10 */
		    background-image:      -o-linear-gradient(top, #ffffff, #f6f6f6); /* Opera 11.10+ */
		    background-image:         linear-gradient(top, #ffffff, #f6f6f6);
		}
		.btn:active{
		    background-image: -webkit-gradient(linear, left top, left bottom, from(#e8e8e8), to(#ffffff)); /* Saf4+, Chrome */
		    background-image: -webkit-linear-gradient(top, #e8e8e8, #ffffff); /* Chrome 10+, Saf5.1+, iOS 5+ */
		    background-image:    -moz-linear-gradient(top, #e8e8e8, #ffffff); /* FF3.6 */
		    background-image:     -ms-linear-gradient(top, #e8e8e8, #ffffff); /* IE10 */
		    background-image:      -o-linear-gradient(top, #e8e8e8, #ffffff); /* Opera 11.10+ */
		    background-image:         linear-gradient(top, #e8e8e8, #ffffff);
		}
		.btn:focus {
		    outline: none;
		    border-color:#BD4A39;
		}


		/* Follow Button Styles */

		button.followButton{
		    width:160px;
		}
		button.followButton.following{
		    background-color: #ffffff;
		    background-repeat: repeat-x;
		    background-image: -khtml-gradient(linear, left top, left bottom, from(#62c462), to(#57a957));
		    background-image: -moz-linear-gradient(top, #62c462, #57a957);
		    background-image: -ms-linear-gradient(top, #62c462, #57a957);
		    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #62c462), color-stop(100%, #57a957));
		    background-image: -webkit-linear-gradient(top, #e86060, #ff3b00);
		    background-image: -o-linear-gradient(top, #62c462, #57a957);
		    background-image: linear-gradient(top, #62c462, #57a957);
		    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#62c462', endColorstr='#57a957', GradientType=0);
		    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		    border-color: #57A957 #57A957 #3D773D;
		    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		    color:#fff;
		}
		button.followButton.unfollow{
		    background-color: #C43C35;
		    background-repeat: repeat-x;
		    background-image: -khtml-gradient(linear, left top, left bottom, from(#ee5f5b), to(#c43c35));
		    background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
		    background-image: -ms-linear-gradient(top, #ee5f5b, #c43c35);
		    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ee5f5b), color-stop(100%, #c43c35));
		    background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
		    background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
		    background-image: linear-gradient(top, #ee5f5b, #c43c35);
		    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ee5f5b', endColorstr='#c43c35', GradientType=0);
		    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		    border-color: #C43C35 #C43C35 #882A25;
		    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		}

	</style>


<style>
	.fh5co-bg-section {
		padding: 0;
	}
</style>



	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="col-md-12 text-center">
			<?php 
				// include("post_new.html");
				// session_start();
				include ("db_conn.php");


				function run_query($connection,$query){
				    $strSQL=mysqli_query($connection,$query);
				    $executed=false;
				    if($strSQL){
				        $exectued=true;
				    }else{
				        echo "Error".$connection->error;
				    }
				          
				    return $executed;
				}


				$person_id  = $_SESSION['person_id'];
				$post_id = $_SESSION['post_id'];

				$sql = "SELECT follow_id from followed_posts WHERE post_id = '".$post_id."' AND person_id = '".$person_id."'";
				// $sql = "INSERT INTO followed_posts (post_id, person_id) VALUES ('".$post_id."','".$person_id."')"; 
				$result = $connection->query($sql);
				if ($result->num_rows == 0) {
					echo '<button class="btn followButton" rel="6">Follow</button>';
				}
				else {
					echo '<button class="btn followButton following" rel="6">Following</button>';
				}


				?>
		    
		    
		</div>
	</div>

<!-- 
	</body>
</html>

 -->