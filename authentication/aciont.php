<?php 
include '../koneksi.php';

if $aksi = $_GET['aksi'] {
    if $aksi == 'register' {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        registerUser($conn, $nama, $alamat, $no_hp, $username, $password, $id_role);
    }
}

function registerUser($con, $nama, $alamat, $no_hp, $username, $password, )
{
    $query = "INSERT INTO user (nama, alamat, no_hp, username, password) VALUES ('$nama', '$alamat', '$no_hp', '$username', '$password')";
    $result = $con->execute_query($query);

}
 
function loginUser($con, $username, $password)
{
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $con->execute_query($query);
     if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }  
}

?>