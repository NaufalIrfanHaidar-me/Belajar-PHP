<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label><br>
    <input type="number" name="nis" placeholder="Ex. 12003102" /><br>

    <label for="Nama">Nama Lengkap :</label><br>
    <input type="text" name="nama" placeholder="Ex. Agung Aryanto" /><br>

    <label for="tanggal_lahir">Tanggal Lahir :</label><br>
    <input type="date" name="tanggal_lahir" /><br>

    <label for="nilai">Nilai:</label><br>
    <input type="number" name="nilai" placeholder="Ex. 80.56" /><br><br>

    <input type="submit" name="simpan" value="Simpan Data" />
    <a href="input-datadiri.php">Kembali</a> 
</form>

<?php 
    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $nilai = $_POST["nilai"];

        // CREATE - Menambahkan Data ke Database
        $query ="
            INSERT INTO datadiri VALUES
            ('$nis', '$nama', '$tanggal_lahir', '$nilai');
        ";
        
        include ('./input-config.php');
        $insert = mysqli_query($mysqli, $query);

        if ($insert){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-datadiri.php';
                </script>
            ";
        }
    }
?>