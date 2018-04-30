

<?php 

include 'session.php';

include("header.php");

?>




<div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
    	<center>
        <a href="post_del.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-trash"></span> Delete 
        </a>
        <a href="update.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-edit"></span> Edit
        </a>
    </center>
      </p> 
    </div>
</div>




<?php


/*echo "
<div class='feds'>
	<div id='fh5co-core-feature'>
		<div class='container'>
			<div class='row'>
				<div class='features'>
					<div class='animate-box' data-animate-effect='fadeInLeft'>
						<div class='table-c'>
							<div class='desc'>
								<span>"  .$_SESSION['subject']. "</span>
								<h3>"  .$_SESSION['subject']. "</h3>
								<p>"  .$_SESSION['body']. "</p>
								<p class='author'><cite>&mdash; John Doe</cite></p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
";
*/
echo '

	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h3>'  .$_SESSION['subject']. '</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-2">
					<div class="row">
						<div class="col-md-12 animate-box">
							<div class="testimony">
								<p>'  .$_SESSION['body']. '</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

';

// echo $_SESSION['post_id'];

include 'junk.php';


include("footer.php");
?>

