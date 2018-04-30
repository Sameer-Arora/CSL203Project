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
    if( count($strSQL)!=0 ){
        $executed=true;
        echo "exec<br>";
    }else{
        echo "Error".$connection->error;
    }
    return $executed;
}

    include('Databaseconnection.php');

    $successful_login=false;
    $successful_signup=false;
    $action=$_GET['action'];
    echo $action;
    $person_name;
    

    if(isset($_GET['action']))
    {
        $message="";

        if($_GET['action']=="login")
        {

            $email = mysqli_real_escape_string($connection,$_POST['email']);
            $password = mysqli_real_escape_string($connection,$_POST['password']);
            $role = mysqli_real_escape_string($connection,$_POST['role']);

             echo "$email,$password,$role";

            if($role=="student"){


                $strSQL = mysqli_query($connection," select name,auth.person_id from auth inner join student on student.person_id=auth.person_id where email='".$email."'" ) ;

                $Results=mysqli_fetch_array($strSQL);

               // echo count($Results);
                echo "<br>".mysqli_num_rows($strSQL);


                if(mysqli_num_rows($strSQL)==0)
                {
                    $message =" Sign up first !!";
                    echo $message;
                }
                else
                    {        

              
                    $strSQL = mysqli_query($connection,"select name,auth.person_id from auth inner join student on student.person_id=auth.person_id where email='".$email."' and role='".$role."' and password='".($password)."'") ;

                    $Results=mysqli_fetch_array($strSQL);

                   // echo count($Results);
                    echo "<br>".mysqli_num_rows($strSQL);

                    if(mysqli_num_rows($strSQL)==1)
                    {
                        $message = $Results['name']." Login Sucessfully!!";
                        echo $message;
                        $person_name=$Results['name'];
                        $successful_login=true;
                        $person_id=$Results['person_id'];
                    }
                    else
                    {
                        $message = "Invalid email or role or password!!";
                    }        
               }
            }

            else{

                $strSQL = mysqli_query($connection," select name,auth.person_id from auth inner join faculty on faculty.person_id=auth.person_id where email='".$email."'" ) ;

                $Results=mysqli_fetch_array($strSQL);

               // echo count($Results);
                echo "<br>".mysqli_num_rows($strSQL);


                if(mysqli_num_rows($strSQL)==0)
                {
                    $message =" Sign up first !!";
                    echo $message;
                }
                else
                    {        

              
                    $strSQL = mysqli_query($connection,"select name,auth.person_id from auth inner join faculty on faculty.person_id=auth.person_id where email='".$email."' and role='".$role."' and password='".($password)."'") ;

                    $Results=mysqli_fetch_array($strSQL);

                   // echo count($Results);
                    echo "<br>".mysqli_num_rows($strSQL);

                    if(mysqli_num_rows($strSQL)==1)
                    {
                        $message = $Results['name']." Login Sucessfully!!";
                        echo $message;
                        $person_name=$Results['name'];
                        $successful_login=true;
                        $person_id=$Results['person_id'];
                    }
                    else
                    {
                        $message = "Invalid email or role or password!!";
                    }        
               }
            } 
       }

        elseif($_GET['action']=="stu_signup")
        {

            $username       = mysqli_real_escape_string($connection,$_POST['username']);
            $email      = mysqli_real_escape_string($connection,$_POST['email']);

            $department = mysqli_real_escape_string($connection,$_POST['department']);

            $year = mysqli_real_escape_string($connection,$_POST['year']);


            $password   = mysqli_real_escape_string($connection,$_POST['password']);

            
            echo "$email , $password ,$username ,$year,$department";

            $query = "SELECT email FROM auth where email='".$email."'";

            $strSQL = mysqli_query($connection,$query);
            $numResults = mysqli_num_rows($strSQL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $message =  "Invalid email address please type a valid email!!";
                echo $message;
                
            }
            elseif($numResults>=1)
            {
                $message = $email." Email already exist!!  you can login";
                echo $message;
            }
            else
            {   
                $query = "insert into auth(email,password,role) values('".$email."','".$password."',\"student\")";

                $execute=run_query($connection,$query);
                
               if($execute==false){
                    $message = "cannt execute insert!! ";
                    echo $message;
                }else{
                    $message = "executed auth!! ";
                    echo $message;
                    $person_id=mysqli_insert_id($connection);
                }

                $query = "insert into student(name,department,year,person_id) values('".$username."','".$department."',".$year.",".$person_id.")";

                $execute=run_query($connection,$query);
                
                if($execute==true){
                    $message = "Signup Sucessfully!! ";
                    echo $message;
                    $successful_signup=true;
                }else{
                    $message = "cannt execute insert !!";
                    echo $message;
                }
            }
        }

        elseif ($_GET['action']=="fac_signup") {
        
            $username       = mysqli_real_escape_string($connection,$_POST['username']);
            $email      = mysqli_real_escape_string($connection,$_POST['email']);

            $department = mysqli_real_escape_string($connection,$_POST['department']);

            $post = mysqli_real_escape_string($connection,$_POST['post']);

            $research_int = mysqli_real_escape_string($connection,$_POST['rea']);

            $phone = mysqli_real_escape_string($connection,$_POST['phone']);


            $password   = mysqli_real_escape_string($connection,$_POST['password']);

            
            echo "$email , $password ,$username ,$post,$department,$phone,$research_int";

            $query = "SELECT email FROM auth where email='".$email."'";

            $strSQL = mysqli_query($connection,$query);
            $numResults = mysqli_num_rows($strSQL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $message =  "Invalid email address please type a valid email!!";
                echo $message;
                
            }
            elseif($numResults>=1)
            {
                $message = $email." Email already exist!!  you can login";
                echo $message;
            }
            else
            {   
                $query = "insert into auth(email,password,role) values('".$email."','".$password."',\"faculty\")";

                $execute=run_query($connection,$query);
                
               if($execute==false){
                    $message = "cannt execute insert!! ";
                    echo $message;
                }else{
                    $message = "executed auth!! ";
                    echo $message;
                    $person_id=mysqli_insert_id($connection);
                }
                echo "insert into faculty(name,department,reasearch_area,post,phone_number,person_id) values('".$username."','".$department."','".$research_int."','".$post."',".$phone.",".$person_id.")<br>";

                $query = "insert into faculty(name,department,reasearch_area,post,phone_number,person_id) values('".$username."','".$department."','".$research_int."','".$post."',".$phone.",".$person_id.")";

                $execute=run_query($connection,$query);
                
                if($execute==true){
                    $message = "Signup Sucessfully!! ";
                    echo $message;
                    $successful_signup=true;
                }else{
                    $message = "cannt execute insert !!";
                    echo $message;
                }
            }
        }

    }

if($successful_login){
?>    
    <script>
    redirect("../index.php",'post',{form_submitted:'true',message:'<?php echo $message;?>',name:'<?php echo $person_name;?>',person_id:'<?php echo $person_id;?>'} );
    </script>    

<?php }
if($successful_signup){
    echo "cute";
    ?>

    <script>
    redirect("../index.php",'post',{form_submitted:'true',message:'<?php echo $message;?>' ,name: '<?php echo $username;?>',person_id:'<?php echo $person_id;?>'}  );
    </script>

<?php }
else {
    ?>

    <script>

    redirect("../login.php",'get',{message:'<?php echo $message;?>' ,action: '<?php echo $action;?>'} );

    </script>

<?php } ?>
