<script>

    function redirect(url,method, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = method;
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}
    
</script>

<?php 

function run_query($connection,$query) {
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if($strSQL){
        $executed=true;
        echo "executed.";
    }else{
        echo "Error".$connection->error;
    }
    #echo "fsaf $executed" ;     
    return $executed;
}

    include('Databaseconnection.php');

    $successful_login=false;
    $successful_signup=false;
    $action=$_POST['action'];
    $person_name;
    

    if(isset($_POST['action']))
    {
        $message="";

        if($_POST['action']=="login")
        {

            $email = mysqli_real_escape_string($connection,$_POST['email']);
            $password = mysqli_real_escape_string($connection,$_POST['password']);

            //password
            $strSQL = mysqli_query($connection,"select name,person_id from auth where email='".$email."' and password='".($password)."'");
            $Results = mysqli_fetch_array($strSQL);
            
            if(count($Results)>=1)
            {
                $message = $Results['name']." Login Sucessfully!!";
                $person_name=$Results['name'];
                $successful_login=true;
                $person_id=$Results['person_id'];
            }
            else
            {
                $message = "Invalid email or password!!";
            }        
        }
        elseif($_POST['action']=="signup")
        {
            $name       = mysqli_real_escape_string($connection,$_POST['name']);
            $email      = mysqli_real_escape_string($connection,$_POST['email']);
            $phone_number = mysqli_real_escape_string($connection,$_POST['phone_number']);


            $password   = mysqli_real_escape_string($connection,$_POST['password']);

            
            echo "$email , $password ,$name ,$phone_number";
            $query = "SELECT email FROM auth where email='".$email."'";

            $strSQL = mysqli_query($connection,$query);
            $numResults = mysqli_num_rows($strSQL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $message =  "Invalid email address please type a valid email!!";
                echo $message;
                
            }
            elseif (!preg_match("/[0-9]{10}$/",$phone_number)){
                $message =  "Invalid phone number please type a valid phone number!!";
                echo $message;
            }
            elseif (!preg_match("/^[a-zA-Z ]*$/",$name)){
                $message =  "Invalid name please type a valid name!!";
                echo $message;
            }
            
            elseif($numResults>1)
            {
                $message = $email." Email already exist!!  you can login";
                echo $message;
            }
            else
            {   
                $query = "insert into auth(name,email,password,phone_number) values('".$name."','".$email."','".$password."',".$phone_number.")";

                $execute=run_query($connection,$query);
                $message="break";
                $re=true;
                //echo $re;
                echo "<br/>$message";
                echo $execute;    
                if($execute==true){
                    $message = "Signup Sucessfully!! ";
                    echo $message;
                    $successful_signup=true;
                    $person_name=$name;
                    
                    $query = "select person_id from auth where email='".$email."'";
                    $strSQL=mysqli_query($connection,$query);
                    $Results = mysqli_fetch_array($strSQL);
                    $person_id=$Results['person_id'];
           
                    $successful_signup=true;
                $executed=run_query($connection,$query);
                
                }
            }
        }
echo $message;

    }



if($successful_login){
?>    
    <script>
    redirect("/csl203/sample/Register.php",'post',{form_submitted:'true',message:'<?php echo $message;?>',name:'<?php echo $person_name;?>',person_id:'<?php echo $person_id;?>'} );
    </script>    

<?php }
else if($successful_signup){
    ?>

    <script>
    /*redirect("/csl203/sample/Register.php",'post',{form_submitted:'true',message:'<?php echo $message;?>' ,name: '<?php echo $person_name;?>',person_id:'<?php echo $person_id;?>'}  );
    */    
    </script>

<?php }
else {
    ?>

    <script>
    /*redirect("/csl203/sample/Register.php",'get',{message:'<?php echo $message;?>' ,action: '<?php echo $action;?>'} );
*/
    </script>

<?php } ?>
