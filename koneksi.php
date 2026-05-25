<?php 

$hostname="localhost";
$username="root";
$password="";
$db="pos_toko";
$conn = mysqli_connect ($hostname, $username, $password, $db);

if($conn){
    echo "berhasil";
}else{
    echo "gagal";
}

?>

