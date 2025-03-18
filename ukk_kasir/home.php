<body onload="hide()">
<div class="container-fluid px-4" >
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM pelanggan")); ?> Total pelanggan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <button class="tombol small text-white stretched-link" onclick="tekan()">Lihat Detail Total Pelanggan</button><hr>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM produk")); ?> Total produk</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <button class="small text-white stretched-link tombol" onclick="tekan1()">Lihat Detail Produk</button><hr>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM penjualan")); ?> Pembelian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <button class="tombol small text-white stretched-link" onclick="tekan2()">Lihat Detail Pembelian</button><hr>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user")); ?> Total Pengguna</div>
                                </div>
                            </div>
                        </div>
                    </div>
       
<div class="container-fluid px-4" id="pelanggan_tabel">
                        <h1 class="mt-4">pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">pelanggan</li>
                        </ol>
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                            </tr>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT*FROM pelanggan");
                                while($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo $data['no_telepon']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </table>

                    </div>


<div class="container-fluid px-4" id="produk">
                        <h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stock</th>
                            </tr>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT*FROM produk");
                                while($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data['nama_produk']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><?php echo $data['stock']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </table>

                    </div>

                    <div class="container-fluid px-4" id="pembelian_tabel">
                        <h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pembelian</li>
                        </ol>
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>pelanggan</th>
                            </tr>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT*FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan = penjualan.id_pelanggan");
                                while($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data['tanggal_penjualan']; ?></td>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['total_harga']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </table>

                    </div>



        <script type="text/javascript">
               x = document.getElementById("pelanggan_tabel");
                y = document.getElementById("produk");
                 z = document.getElementById("pembelian_tabel");
            function hide(){
                  x.style.display = "none";
                 y.style.display = "none";
                  z.style.display = "none";
              }

            function tekan() {
               if (x.style.display === "none") {
                x.style.display = "block";
                 y.style.display = "none";
                  z.style.display = "none";
               } else {
               x.style.display = "none"
                y.style.display = "none";
                  z.style.display = "none"; 
               }
            }

             function tekan1() {
               if (y.style.display === "none") {
                x.style.display = "none";
                 y.style.display = "block";
                  z.style.display = "none";
               } else {
               x.style.display = "none"
                y.style.display = "none";
                  z.style.display = "none"; 
               }
            }

             function tekan2() {
               if (z.style.display === "none") {
                x.style.display = "none";
                 y.style.display = "none";
                  z.style.display = "block";
               } else {
               x.style.display = "none"
                y.style.display = "none";
                  z.style.display = "none"; 
               }
            }




        </script>
</body>