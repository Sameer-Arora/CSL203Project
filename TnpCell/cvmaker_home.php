<?php

include('session.php');

if(isset($_SESSION['name']) )
	echo "cone";
else{
    header("Location:login.php?message=Please+login+session+timed+out");
}

echo print_r($_POST);

foreach ($_POST as $key => $value) {
        echo $key;
        echo $value."<br>";
}

$query ="SELECT * from cv where person_id=".$_SESSION['person_id']." order by time_updated limit 6";

$cse_query ="SELECT cv_id,SUM(ratings.cv_rate)/COUNT(ratings.cv_rate),cv.title,cv.image,cv.time_updated from cv inner join ratings using(cv_id) where department=\"CSE\" GROUP by cv_id order by SUM(ratings.cv_rate)/COUNT(ratings.cv_rate) DESC,time_updated DESC limit 6";

$ee_query ="SELECT cv_id,SUM(ratings.cv_rate)/COUNT(ratings.cv_rate),cv.title,cv.image,cv.time_updated from cv inner join ratings using(cv_id) where department=\"EE\" GROUP by cv_id order by SUM(ratings.cv_rate)/COUNT(ratings.cv_rate) DESC,time_updated DESC limit 6";
$me_query ="SELECT cv_id,SUM(ratings.cv_rate)/COUNT(ratings.cv_rate),cv.title,cv.image,cv.time_updated from cv inner join ratings using(cv_id) where department=\"ME\" GROUP by cv_id order by SUM(ratings.cv_rate)/COUNT(ratings.cv_rate) DESC,time_updated DESC limit 6";
$med_query ="SELECT cv_id,SUM(ratings.cv_rate)/COUNT(ratings.cv_rate),cv.title,cv.image,cv.time_updated from cv inner join ratings using(cv_id) where department=\"MED\" GROUP by cv_id order by SUM(ratings.cv_rate)/COUNT(ratings.cv_rate) DESC,time_updated DESC limit 6";

$ch_query ="SELECT cv_id,SUM(ratings.cv_rate)/COUNT(ratings.cv_rate),cv.title,cv.image,cv.time_updated from cv inner join ratings using(cv_id) where department=\"CH\" GROUP by cv_id order by SUM(ratings.cv_rate)/COUNT(ratings.cv_rate) DESC,time_updated DESC limit 6";

require('cvmaker_homemain.php');

?>

<script type="text/javascript">
	
	$(document).ready(function() {
		//alert("fas");

		<?php 
		if(isset($_POST['message'])):?>
			//alert("gdsd");
			$('.alert').addClass('show fade');


			<?php if(isset($_POST['doc_added'])) : ?>

				$("#status").html('Success');
				$("#message").append('<?php echo $_POST["message"];  ?>');
				$('.alert').removeClass('alert-danger');
				$('.alert').addClass('alert-success');




			<?php else: ?>
				$("#status").html('Failed');
				$("#message").append('<?php echo $_POST["message"];  ?>');
				$('.alert').removeClass('alert-sucess');
				$('.alert').addClass('alert-danger');

			<?php endif; ?>
			//$('.alert').hide(10);

		
		<?php else: ?>
			//$('.alert').hide(10);

		<?php endif; ?>
	});
	
</script>


<?php 
?>
