<? php

echo "<script type='text/javascript'>alert('$message');</script>";
include_once 'Databaseconnection.php';
/*
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 1 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();

*/

echo "<script type='text/javascript'>alert('$message');</script>";

# New Object
$rating = new ratings($_POST['widget_id']);
 
# either return ratings, or process a vote
isset($_POST['fetch']) ? $rating->get_ratings() : $rating->vote();

class ratings {
    private $widget_id;
    private $data = array();
        
function __construct($wid) {
    $this->widget_id = $wid;
    $query = mysqli_query($connection,"SELECT * from ratings" ) ;
    $this->data = mysqli_fetch_array($query);
}

}

public function vote() {
    # Get the value of the vote
    preg_match('/star_([1-5]{1})/', $_POST['clicked_on'], $match);
    $vote = $match[1];

    $ID = $this->widget_id;
	# Update the record if it exists
	$message = "wrong answer";
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	if($this->data[$ID]) {

	    $this->data[$ID]['number_votes'] += 1;
	    $this->data[$ID]['total_points'] += $vote;
	}
	# Create a new one if it does not
	else {

	    $this->data[$ID]['number_votes'] = 1;
	    $this->data[$ID]['total_points'] = $vote;
	}

	$this->data[$ID]['dec_avg'] = round( $this->data[$ID]['total_points'] / $this->data[$ID]['number_votes'], 1 );
    $this->data[$ID]['whole_avg'] = round( $this->data[$ID]['dec_avg'] );
           
    $this->get_ratings();

}

public function get_ratings() {
    if($this->data[$this->widget_id]) {
        echo json_encode($this->data[$this->widget_id]);
    }
    else {
        $data['widget_id'] = $this->widget_id;
        $data['number_votes'] = 0;
        $data['total_points'] = 0;
        $data['dec_avg'] = 0;
        $data['whole_avg'] = 0;
        echo json_encode($data);
    } 
}

?>
