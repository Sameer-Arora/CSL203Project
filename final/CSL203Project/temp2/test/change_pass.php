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

    $changed=false;
    $person_name;
    

    if(isset($_POST))
    {
        $message="";

        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $newpassword = mysqli_real_escape_string($connection,$_POST['new_password']);

         echo "$email,$password,$newpassword";

        $strSQL = mysqli_query($connection," select name,auth.person_id,auth.password from auth inner join student on student.person_id=auth.person_id where email='".$email."'" ) ;

        $Results=mysqli_fetch_array($strSQL);

       // echo count($Results);
        echo "<br>".mysqli_num_rows($strSQL);


        if(mysqli_num_rows($strSQL)==0)
        {
            $message =" Sign up first Email doesnt exist!!";
            echo $message;
        }
        else{        

            $person_name=$Results['name'];
            $person_id=$Results['person_id'];

            //previous password matches.
            if( $password != $Results['password'] ){
                $message =" Enter the correct Password!!";
                echo $message;
            }
            else{   

                $strSQL = mysqli_query($connection," update auth set password='".$newpassword."' where email='".$email."'" ) ;

                if($strSQL)
                {
                    $message = " Changed the new Password!!";
                    $changed=true;
                    echo $message;
                }
                else
                    {        
                    
                    $message = "Cannot update the password!!";
                    echo "Error".$connection->error;
              
                     }

                }
        }
    }

if($changed){
?>    
    <script>
    redirect("../index.php",'post',{form_submitted:'true',message:'<?php echo $message;?>',name:'<?php echo $person_name;?>',person_id:'<?php echo $person_id;?>'} );
    </script>    

<?php }
else {
    ?>

    <script>

    redirect("../reset.php",'get',{message:'<?php echo $message;?>' } );

    </script>

<?php } ?>
