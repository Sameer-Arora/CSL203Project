<?php

include('session.php');

if(isset($_SESSION['name']) )
	echo "cone";
else{
    header("Location:login.php?message=Please+login+session+timed+out");
}

if(isset($_GET['department'])){
	if($_GET['author'] =="" ){
		$search_query ="SELECT * from lom where department='".$_GET['department']."' and type='".$_GET['type']."' order by time_updated ";
		#echo $search_query;
	}
	else{
		$search_query ="SELECT * from lom INNER join auth USING(person_id) inner join student using(person_id) where department='".$_GET['department']."' and type='".$_GET['type']."' and name='".$_GET['name']."' order by time_updated ";
		
		#echo $search_query;
	}

}

echo print_r($_POST);

foreach ($_POST as $key => $value) {
        echo $key;
        echo $value."<br>";
}

$query ="SELECT * from lom where person_id=".$_SESSION['person_id']." order by time_updated ";

$cse_query ="SELECT lom_id,SUM(ratings.lom_rate)/COUNT(ratings.lom_rate),lom.title,lom.image,lom.time_updated,lom.file_link from lom left join ratings using(lom_id) where department=\"CSE\" and share_option=1 GROUP by lom_id order by SUM(ratings.lom_rate)/COUNT(ratings.lom_rate) DESC,time_updated DESC ";

$ee_query ="SELECT lom_id,SUM(ratings.lom_rate)/COUNT(ratings.lom_rate),lom.title,lom.image,lom.time_updated,lom.file_link from lom left join ratings using(lom_id) where department=\"EE\" and share_option=1 GROUP by lom_id order by SUM(ratings.lom_rate)/COUNT(ratings.lom_rate) DESC,time_updated DESC ";
$me_query ="SELECT lom_id,SUM(ratings.lom_rate)/COUNT(ratings.lom_rate),lom.title,lom.image,lom.time_updated,lom.file_link from lom left join ratings using(lom_id) where department=\"ME\" and share_option=1 GROUP by lom_id order by SUM(ratings.lom_rate)/COUNT(ratings.lom_rate) DESC,time_updated DESC ";
$med_query ="SELECT lom_id,SUM(ratings.lom_rate)/COUNT(ratings.lom_rate),lom.title,lom.image,lom.time_updated,lom.file_link from lom left join ratings using(lom_id) where department=\"MED\" and share_option=1 GROUP by lom_id order by SUM(ratings.lom_rate)/COUNT(ratings.lom_rate) DESC,time_updated DESC ";

$ch_query ="SELECT lom_id,SUM(ratings.lom_rate)/COUNT(ratings.lom_rate),lom.title,lom.image,lom.time_updated,lom.file_link from lom left join ratings using(lom_id) where department=\"CH\" and share_option=1 GROUP by lom_id order by SUM(ratings.lom_rate)/COUNT(ratings.lom_rate) DESC,time_updated DESC ";


require('lommaker_homemain.php');


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
