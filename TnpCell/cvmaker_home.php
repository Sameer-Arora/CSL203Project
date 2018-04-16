<?php

include('session.php');

if(isset($_SESSION['name']) )
	echo "cone";


$query ="SELECT * from cv where person_id=".$_SESSION['person_id']." order by time_updated limit 6";
$add_query ="SELECT * from cv where person_id=".$_SESSION['person_id']." order by time_updated limit 1";

require('cvmaker_homemain.php');

?>

<script type="text/javascript">
	
	$(document).ready(function() {
		//alert("fas");

		<?php if(isset($_POST)):?>
			//alert("gdsd");
			$('.alert').addClass('show fade');

			<?php if(isset($_POST['doc_added'])) : ?>

				$("#status").append('Success');
				$("#message").append('<?php echo $_POST["message"];  ?>');
				$('.alert').removeClass('alert-danger');
				$('.alert').addClass('alert-success');




			<?php else: ?>

				$("#message").append('<?php echo $_POST["message"];  ?>');
				$('.alert').removeClass('alert-sucess');
				$('.alert').addClass('alert-danger');

			<?php endif; ?>
		
		<?php else: ?>
			//alert("dfs");
			$('.alert').alert('close');



		<?php endif; ?>
		//alert("dfs");
	});
	
</script>


<?php 
//require('cvmaker_home.html');
?>
