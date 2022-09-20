<?php
    include('./input-config.php');
    echo "<a href='input-datadiri-tambah.php'>Tambah Data</a>";
    echo "<hr>";

    // Menampilkan Data Dari Database
    $no = 1;
    $tabledata ="";
    $data = mysqli_query($mysqli,"SELECT * FROM nilai ");
    while($row = mysqli_fetch_array($data)){
        $nilai_akhir = ( 
            $row["nilai_kehadiran"] + 
            $row["nilai_tugas"] + 
            $row["uts"] + 
            $row["uas"] ) / 4;
        $tabledata .="
            <tr>
                <td>".$row["nis"]."</td>
                <td>".$row["nama_lengkap"]."</td>
                <td>".$row["kelas"]."</td>
                <td>".$row["nilai_kehadiran"]."</td>
                <td>".$row["nilai_tugas"]."</td>
                <td>".$row["uts"]."</td>
                <td>".$row["uas"]."</td>
                <td>".$nilai_akhir."</td>
                <td>
                    <a href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                    &nbsp;-&nbsp;
                    <a href='input-datadiri-hapus.php?&nis=".$row["nis"]."'
                    onclick='return confirm(\"Yakin Dek ?\");'>Hapus</a>
                </td>
            </tr>
        ";
        $no++;
    }

    echo "
        <table cellpadding=5 border=1 cellspacing=0 >
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>kelas</th>
                <th>Nilai kehadiran</th>
                <th>Nilai Tugas</th>
                <th>Uts</th>
                <th>Uas</th>
                <th>Nilai Akhir</th>
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";
?>
