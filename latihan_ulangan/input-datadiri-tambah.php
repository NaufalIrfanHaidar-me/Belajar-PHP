<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label><br>
    <input type="number" name="nis" placeholder="Ex. 12003102" /><br>

    <label for="Nama">Nama Lengkap :</label><br>
    <input type="text" name="nama" placeholder="Ex. Agung Aryanto" /><br>

    <label for="kelas">Kelas :</label><br>
    <input type="text" name="kelas" /><br>

    <label for="nilai_kehadiran">Niali Kehadiran:</label><br>
    <input type="number" name="nilai_kehadiran" placeholder="Ex. 80.56" /><br><br>

    <label for="nilai_tugas">Niali Tugas:</label><br>
    <input type="number" name="nilai_tugas" placeholder="Ex. 80.56" /><br><br>

    <label for="uts">Uts:</label><br>
    <input type="number" name="uts" placeholder="Ex. 80.56" /><br><br>

    <label for="uas">Uas:</label><br>
    <input type="number" name="uas" placeholder="Ex. 80.56" /><br><br>


    <input type="submit" name="simpan" value="Simpan Data" />
    <a href="input-datadiri.php">Kembali</a> 
</form>

<?php 
    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];

        // CREATE - Menambahkan Data ke Database
        $query = "
            INSERT INTO nilai VALUES
            ('$nis', '$nama', '$kelas', '$nilai_kehadiran', '$nilai_tugas', '$uts', '$uas');
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