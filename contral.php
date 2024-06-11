<?php
//session_start();
require('include/conect.php');
const keyi="mohammed";

$sql="select inter from manager where mang_id=$_SESSION[mang_id]";
$result=$con->prepare($sql);

$result->execute();

$inter=$result->fetchColumn();


function contrul()
{
    global $inter;


    if($inter==keyi)
    {
return true;

    }else{
        return false;
    }
    
}

?>