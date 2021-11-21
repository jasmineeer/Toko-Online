<?php
include "connection.php";
if (isset($_POST["save_petugas"])) {
    # insert data
    $id_petugas = $_POST["id_petugas"];
    $nama_petugas = $_POST["nama_petugas"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    $sql = "insert into petugas values
    ('$id_petugas','$nama_petugas','$username','$password','$level')";

    if (mysqli_query($connect,$sql)) {
        // echo $sql;
        header("location:list-petugas.php");
    }else {
        echo mysqli_error($connect);
    }
}

else if(isset($_POST["update_petugas"])) {
    # edit/update petugas
    $id_petugas = $_POST["id_petugas"];
    $nama_petugas = $_POST["nama_petugas"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];
    
    if (empty($_POST["password"])) {
        # password tidak ikut teredit
        $sql = "update petugas set
        nama_petugas='$nama_petugas',
        username='$username','level='$level'
        where id_petugas='$id_petugas'";
    }else {
        # password ikut teredit
        $password = sha1($_POST["password"]);
        $sql = "update petugas set
        nama_petugas='$nama_petugas',
        username='$username', password='$password',
        level='$level'
        where id_petugas='$id_petugas'";
    }

    if (mysqli_query($connect,$sql)) {
        header("location:list-petugas.php");
    }else {
        echo mysqli_error($connect);
    }

    
}
      
?>