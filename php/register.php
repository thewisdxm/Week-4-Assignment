<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    $file = '../storage/users.csv';
        $handle = fopen($file, "a");
            fputcsv ($handle, $_POST);
        
        fclose ($handle);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Registration</title>
</head>
<body>
    <?php
        echo "<h2>User Successfully Registered</h2>";
    ?>
    <form action="../forms/login.html" method="get">
        <br><button type="submit">Proceed</button>
    </form>
</body>
</html>

