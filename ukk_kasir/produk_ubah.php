<?php
    $id = $_GET['id'];
        if(isset($_POST['nama_produk'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];

        $query = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama', harga='$harga', stock='$stock' WHERE id_produk=$id");
        if($query) {
            echo '<script>alert("Ubah data berhasil")</script>';
        }else{

            echo '<script>alert("ubah data gagal")</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT*FROM produk WHERE id_produk=$id");
    $data = mysqli_fetch_array($query);

?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">produk</li>
                        </ol>
                        <a href="?page=produk" class="btn btn-danger">Kembali</a>
                        <hr>

                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Produk</td>
                                    <td widht="1">:</td>
                                    <td><input class="from-control" value="<?php echo $data['nama_produk']; ?>"type="text" name="nama_produk"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="harga" rows="5" class="from-control"><?php echo $data['harga']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><input class="from-control" type="stock" step="0" value <?php echo $data['stock']; ?> name="stock"></td>
                                </tr>
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
