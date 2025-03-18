<?php
    if(isset($_POST['nama_pelanggan'])) {
        $nama = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];

        $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan,alamat,no_telepon) values('$nama' , '$alamat' , '$no_telepon')");
        if($query) {
            echo '<script>alert("Data Berhasil Ditambahkan")</script>';
        }else{

            echo '<script>alert("tambah data gagal")</script>';
        }

        if($_SERVER['REQUEST_METHOD']=='POST') {
            if(empty($_POST['nama_pelanggan']) 
        || empty($_POST['alamat']) ||
        empty($_POST['no_telepon'])) {
                $error = '<script>alert("kolom perlu diisi!"); history.back();</script>';
            }else{
        $koneksi = mysqli_connect("localhost", "nama_pelanggan", "username", "password", "ukk_kasir");
        if (!$koneksi) {
            die("koneksi gagal:" . mysqli_connect_error());
        }
        $query = "INSERT INTO tabel (nama_pelanggan,alamat,no_telepon) VALUES ('" . $_POST['nama_pelanggan'] . "' , '" . $_POST['alamat'] . "','" . $_POST['no_telepon'] ."')";
        if (!mysqli_query($koneksi, $query))
        {
            echo "error: " . $query . "<br>" . mysqli_error($koneksi); 
            }    
            mysqli_close($koneksi);
            }
        }
    }

?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pelanggan</li>
                        </ol>
                        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
                        <hr>

                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Nama Pelanggan</td>
                                    <td widht="1">:</td>
                                    <td><input class="form-control" type="text" name="nama_pelanggan"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="alamat" rows="5" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="number" step="0" name="no_telepon"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="<?php echo
                                        $_SERVER['PHP_SELF']; ?>"method="post"><textarea name="no_telepon"></textarea>
                                        <?php if(isset($error)) { echo '<p style="color: red;">' . $error . '</p>'; } ?>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
