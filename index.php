<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSP KLASTER WEB</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="kunci">
        <input type="submit" value="cari">
    </form>
    <table width="100%" border="1" cellpadding="5">
    <tr>
        <td>No</td>
        <td>No Transaksi</td>
        <td>Tanggal</td>
        <td>Barang</td>
        <td>Jumlah</td>
        <td>Harga</td>
        <td>Subtotal</td>
        <td>Total</td>
    </tr>

    <?php 
    include 'koneksi.php';
    $kunci = @$_GET['kunci'];
    if(empty($kunci)){
        $q = mysqli_query($k, "SELECT * FROM v_trans");
    }else{
        $q = mysqli_query($k, "SELECT * FROM v_trans where nama_barang like '%$kunci%'");
    }
    $no = '1';
    while($r = mysqli_fetch_assoc($q)){
    ?>

    <tr>
        <td><?= $no++?></td>
        <td><?=$r['kode_trans']?></td>
        <td><?=$r['tgl_trans']?></td>
        <td><?=$r['nama_barang']?></td>
        <td><?=$r['jumlah']?></td>
        <td>Rp. <?=number_format($r['harga']),0,".","."?></td>
        <td>Rp. <?=number_format($r['subtotal']),0,".","."?></td>
        <td>Rp. <?=number_format($r['total_trans']),0,".","."?></td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>