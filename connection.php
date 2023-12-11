<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'user db';
$conn=mysqli_connect($host,$username,$password,$db_name);

if($conn)

{
    echo "connected";

}
else
{
    echo "connection faild";
}