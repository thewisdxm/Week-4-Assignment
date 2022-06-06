<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    if (isset($_POST['submit']))
{
    $file = file_get_contents("../storage/users.csv");
    

    if((strstr($file, "$email")))        // authenticate info in database
{   
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    $oldpass = fopen('../storage/users.csv', 'r');       // open user database
    $newpass = fopen('../storage/temporary.csv', 'w');          // open temporary database
    
    while (false !== ($data = fgetcsv($oldpass))){      // read each csv line as an array

        if ($data[1] == $_POST['email'] || $data[2] ==! $_POST['password']){    // if email exists and/or new password is not same

            $data[2] = $newpassword;        // assign new password
            echo("Success|Password Changed!");
            header("Location: ../forms/login.html");      // redirect to login page
        }   
            fputcsv ($newpass, $data);      // write modified data to the temporary database

    }   // close both files opened previously
            fclose($oldpass);
            fclose($newpass);

            unlink('../storage/users.csv');         // delete former user database
            rename('../storage/temporary.csv', '../storage/users.csv');     // rename temporary database as former
}       
        else {
            echo "<h2>User does not exist</h2>";        // echo User does not exist if email is not in database
        }      
}   
}

?>
