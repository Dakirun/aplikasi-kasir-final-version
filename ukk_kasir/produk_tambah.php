<?php
    if(isset($_POST['nama_produk'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];

        $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,harga,stock) values('$nama' , '$harga' , '$stock')");
        if($query) {
            echo '<script>alert("tambah data berhasil")</script>';
        }else{

            echo '<script>alert("tambah data gagal")</script>';
        }
    }

?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">produk</li>
                        </ol>
                        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                        <hr>

                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Produk</td>
                                    <td widht="1">:</td>
                                    <td><input class="form-control" type="text" name="nama_produk"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="harga"></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="stock"></td>
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
