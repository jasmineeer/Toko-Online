<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Petugas</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">
                    Form Petugas
                </h4>
            </div>
            <div class="card-body">
            <?php
                if (isset($_GET["id_petugas"])) {
                include "connection.php";

                # form utk edit
                $id_petugas = $_GET["id_petugas"];
                $sql = "select * from petugas
                where id_petugas='$id_petugas'";

                # eksekusi SQL
                $hasil = mysqli_query($connect, $sql);

                # konversi ke array
                $petugas = mysqli_fetch_array($hasil);
                ?>
                <form action="process-petugas.php" method="post">
            
                Id Petugas 
                <input type="number" name="id_petugas"
                class="form-control mb-2" readonly
                value="<?=($petugas["id_petugas"])?>">

                Nama Petugas
                <input type="text" name="nama_petugas"
                class="form-control mb-2" required
                value="<?=($petugas["nama_petugas"])?>">

                Username
                <input type="text" name="username"
                class="form-control mb-2" required
                value="<?=($petugas["username"])?>">

                Password
                <input type="password" name="password"
                class="form-control mb-2">

                Level
                <input type="text" name="level"
                class="form-control mb-2" required
                value="<?=($petugas["level"])?>">

                <button type="submit" 
                   class="btn btn-info btn-block" 
                   name="update_petugas">
                   Simpan
                   </button>
                </form>
                <?php
                } else{
                ?>
                   <form action="process-petugas.php" method="post"
                   enctype="multipart/form-data">

                   Id Petugas 
                   <input type="number" name="id_petugas"
                   class="form-control mb-2" required>

                   Nama Petugas
                   <input type="text" name="nama_petugas"
                   class="form-control mb-2" required>

                   Username
                   <input type="text" name="username"
                   class="form-control mb-2" required>

                   Password
                   <input type="password" name="password"
                   class="form-control mb-2" required>

                   Level
                   <input type="text" name="level"
                   class="form-control mb-2" required>

                   <button type="submit" 
                   class="btn btn-info btn-block" name="save_petugas">
                   Simpan
                   </button>
                    </form>
                   <?php
               }
               
               ?>
            </div>
        </div>
    </div>
</body>
</html>