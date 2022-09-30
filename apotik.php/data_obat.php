<?php
include('../Crud.php');

$crud = new Crud;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>

<?php
     if(isset($_GET['id']))
     {
        $id = $_GET['id'];

        $update = $crud->read_data('apotik');
        foreach ($update as $upd) {
            $nama = $upd['nama'];
            $kodeobat = $upd['kodeobat'];
            $kategori = $upd['kategori'];
            $deskripsi = $upd['deskripsi'];
            $gambar = $upd['gambar'];
            $readonly = 'readonly';
            $action = 'update';
        }
     }
     else
     {
        $nama = '';
        $kodeobat = '';
        $kategori = '';
        $deskripsi = '';
        $gambar = '';
        $readonly = '';
        $action = 'simpan';
     }
?>

<h1>Tambah Data Obat</h1>
    <form action="" method="post">
    <table>
        <tr>
            <td>Kode Obat</td>
            <td> : </td>
            <td> <input type="number" name="nama" value="<?php echo $readonly; ?>"></td>
        </tr>
        <tr>
            <td>Nama Obat</td>
            <td> : </td>
            <td> <input type="text" name="nama"  value="<?php echo $nama; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Obat</td>
            <td> : </td>
            <td> <input type="text" name="kategori"  value="<?php echo $kategori; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td> : </td>
            <td> <input type="text" name="deskripsi"  value="<?php echo $deskripsi; ?>"></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td> : </td>
            <td> <input type="file" name="gambar"  value="<?php echo $gambar; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <input type="submit" name="simpan" value="Simpan">
                <input type="reset" value="Reset">
                <input type="hidden" name="action" value=" <?php echo $action; ?> ">
            </td>
        </tr>
    </table>
    </form>
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Search..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class="loader">

    </form>

<form action="" method="get">
    <ul>
        <li>
            <label for="kategori">Kategori Obat : </label>
            <input type="text" name="kategori" id="kategori">
        </li>
        <li>
            <button type="submit" name="filtercategory">Filter!</button>
        </li>
    </ul>
</form>



        <?php
        
        $apotik = $crud->read_data('apotik');
        $no = 1;

        foreach( $apotik as $apt) {
         ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $apt['nama']; ?></td>
            <td><?php echo $apt['kodeobat']; ?></td>
            <td><?php echo $apt['kategori']; ?></td>
            <td><?php echo $apt['deskripsi']; ?></td>
            <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
            <td>
                <a href="data_obat.php?id=<?php echo $apt['nama']; ?>">Edit</a>
                    |
                <a href="hapus.php?id=<?php echo $apt['nama']; ?>">Hapus</a>
            </td>    
        </tr>
        <?php } ?>
        
    </table>
</body>
</html>