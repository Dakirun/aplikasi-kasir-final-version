<?php
    if(isset($_POST['id_pelanggan'])) {

        $id_pelanggan = $_POST['id_pelanggan'];
        $produk = $_POST['produk'];
        $total = 0;
        $tanggal = date('Y/m/d');


        $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan,id_pelanggan) values('$tanggal','$id_pelanggan')");

        $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT*FROM penjualan ORDER BY id_penjualan DESC"));
        $id_penjualan = $idTerakhir['id_penjualan'];

        foreach($produk as $key=>$val) {
            $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT*FROM produk where id_produk=$key"));

            $sub    = $val * $pr['harga'];
            $total += $sub;
            $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan,id_produk,jumlah_produk,sub_total) values('$id_penjualan' , '$key' , '$val' , '$sub')");            
        }


        $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga=$total WHERE id_penjualan=$id_penjualan");

        if($query) {
            echo '<script>alert("tambah data berhasil")</script>';
        }else{

            echo '<script>alert("tambah data gagal")</script>';
        }
    }

?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">pembelian</li>
                        </ol>
                        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                        <hr>

                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Pelanggan</td>
                                    <td widht="1">:</td>
                                    <td>
                                    <select class="form-control form-select" name="id_pelanggan">?        
                                        <?php
                                            $p = mysqli_query($koneksi, "SELECT*FROM pelanggan");
                                            while($pel = mysqli_fetch_array($p)) {
                                                ?>
                                                <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    <select>
                                      
                                    </td>
                                </tr>
                                <?php
                                    $pro = mysqli_query($koneksi, "SELECT*FROM produk");
                                    while($produk = mysqli_fetch_array($pro)) {
                                ?>
                                <tr>
                                    <td><?php echo $produk['nama_produk'] . ' (stock : '.$produk['stock'].') '; ?></td>
                                    <td>:</td>
                                    <td>
                                        <input class="form-control" type="number"
                                    step="0" value="0" max="<?php echo $produk['stock']; ?>" name="produk[<?php echo $produk['id_produk']; ?>]"></td>
                                </tr>
                                <?php
                                    }
                                    ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
