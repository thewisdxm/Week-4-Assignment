<?php
logout ();
function logout(){
    session_start ();
    session_destroy();

    header("location: ../forms/login.html");
    // exit ();
}
// echo "HANDLE THIS PAGE";
?>