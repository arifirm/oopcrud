<?php  

include('../Crud.php');

$crud = new Crud();
if($_POST['action'] == 'simpan') {
    $arrData = array('nama'=>$_POST['nama'],     
    'kodeobat'=>$_POST['kodeobat'],
    'kategori'=>$_POST['kategori'],
    'deskripsi'=>$_POST['deskripsi'],
    'gambar'=>$_POST['gambar']);
$hasil = $crud->simpan('hiburan', $arrData);
}
else
{
    $arrData = array("nama='" .$_POST['nama']. "'",
                     "kategori='" .$_POST['kategori']. "'",
                     "deskripsi='" .$_POST['deskripsi']. "'",
                     "gambar='" .$_POST['gambar']. "'",);
    $idvalue = $_POST['nama'];
$hasil = $crud->update('hiburan', $arrData, 'nama', $idvalue);
}

if($hasil)
{
	header('Location : data_obat.php');
}
else
{
	echo "Gagal Simpan!";
}

?>