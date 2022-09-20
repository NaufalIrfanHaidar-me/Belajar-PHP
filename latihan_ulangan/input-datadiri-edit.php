<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM nilai WHERE nis = '$nis'; ";
        include('./input-config.php');
        $query = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($query);

    }
?>
<h1>Edit Data</h1>
<form action="input-datadiri-edit.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label><br>
    <input value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102" readonly/><br>

    <label for="Nama">Nama Lengkap :</label><br>
    <input value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama" placeholder="Ex. Agung Aryanto" /><br>

    <label for="kelas">Kelas :</label><br>
    <input value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" /><br>

    <label for="nilai_kehadiran">Nilai Kehadiran:</label><br>
    <input value="<?php echo $row["nilai_kehadiran"]; ?>" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56" /><br>

    <label for="nilai_tugas">Nilai tugas:</label><br>
    <input value="<?php echo $row["nilai_tugas"]; ?>" type="number" name="nilai_tugas" placeholder="Ex. 80.56" /><br>

    <label for="uts">Uts:</label><br>
    <input value="<?php echo $row["uts"]; ?>" type="number" name="uts" placeholder="Ex. 80.56" /><br>

    <label for="uts">Uas:</label><br>
    <input value="<?php echo $row["uas"]; ?>" type="number" name="uas" placeholder="Ex. 80.56" /><br><br>


    <input type="submit" name="edit" value="Edit Data" />
    <a href="input-datadiri.php">Kembali</a> 
</form>

<?php 
    if ( isset($_POST["edit"]) ){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];

        // EDIT - Memperbaharui Data
        $query = "
            UPDATE nilai SET nama_lengkap = '$nama',
            kelas = '$kelas',
            nilai_kehadiran = '$nilai_kehadiran',
            nilai_tugas = '$nilai_tugas',
            uts = '$uts',
            uas = '$uas'
            WHERE nis = '$nis';
        ";

        include ('./input-config.php');
        $edit = mysqli_query($mysqli, $query);

        if ($edit){
            echo "
                <script>
                    alert('Data berhasil diperbaharui');
                    window.location='input-datadiri.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal diperbaharui');
                    window.location='input-datadiri-edit.php?nis=$nis';
                </script>
            ";
        }
    }
    
?>