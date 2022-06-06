<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password) {
    if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $file = file_get_contents("../storage/users.csv");
    if(strstr($file, "$email") && strstr($file, "$password")) //authenticate info in database
{
    session_start();
        $_SESSION["valid_user"] = $_POST['email'];
        Header("Location: ../dashboard.php");
}
    // Redirect if not registered
    else {
        header("Location: ../forms/login.html");
        echo "Invalid Username or Password";
}

}
}

?>