



<?php 

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




echo '
	<div id="fh5co-contact">
		<div class="container">
			<div class = "btn_lst">
				<h3>List of companies :</h3>
				
';




$sql = "SELECT DISTINCT company_id,company_name, company_link, apply_date, interview_date, branch, message FROM company ORDER BY company_id DESC";
$result = $connection->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row    


	$count = 0;
    while($row = $result->fetch_assoc()) 
    {

    	echo '

			<button id="myBtn'  . $row['company_id']. '" onclick=\'fun("myModal'  . $row['company_id']. '","myBtn'  . $row['company_id']. '","close'  . $row['company_id']. '")\' class="btn">'  . $row['company_name']. '</button>


			<div id="myModal'  . $row['company_id']. '" class="modal">

		  		<div class="modal-content">
			  		<center>
			   			<span class="close" id="close'  . $row['company_id']. '">&times;</span>

			   			<p>'  . $row['company_id']. ' : '  . $row['company_name']. '</p>
			   			<p>Last apply date is : ' . $row['apply_date']. '</p>
						<p>Interview starts from : ' . $row['interview_date']. '</p>
						<p>Branch : ' . $row['branch']. '</p>
						<p>' . $row['message']. '</p>
			   			<li class="octicon-arrow-right"><a target = "_blank" href="'  . $row['company_link']. '">link to '  . $row['company_name']. '</a></li>
					</center>
		 		 </div>

			</div>

    	';

    }

} 

else 
{
    echo "<center>No ingres_result_seek(result, position)</center>";
}




echo '
	</div>
	</div>
	</div>
';


 ?>

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe; /* Sit on top */
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.btn_lst {
	padding-top: 10%;
	padding-left: 10%;
	padding-right: 10%;
}
</style>


<script>
// Get the modal
function fun(modalid,btnid,spanid){
	var modal = document.getElementById(modalid);

	// Get the button that opens the modal
	var btn = document.getElementById(btnid);

	// Get the <span> element that closes the modal
	var span = document.getElementById(spanid);

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
}

</script>



