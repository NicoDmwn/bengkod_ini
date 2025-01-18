<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Konsultasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Konsultasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Konsultasi Pasien</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right mx-1 my-1"
                                data-toggle="modal" data-target="#addModal">
                                Tambah
                            </button>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Konsultasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form action="pages/konsultasi/tambahkonsul.php" method="post">
                
                                            <div class="form-group">
                                                    <label for="dokter">Nama Dokter</label>
                                                    <select class="form-control" id="dokter" name="dokter">
                                                        <?php
                                                            require 'config/koneksi.php';
                                                            $query = "SELECT * FROM dokter";
                                                            $result = mysqli_query($mysqli,$query);
                                                            while ($datadokter = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $datadokter['id'] ?>">
                                                            <?php echo $datadokter['nama'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..."
                                                        id="subject" name="subject"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pertanyaan">Pertanyaan</label>
                                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                                                        required>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Dokter</th>
                                <th>Subject</th>
                                <th>Pertanyaan</th>
                                <th>Tanggapan</th>   
                                <th>Aksi</th>     
                            </tr>
                        </thead>
                        <tbody>

                            <!-- TAMPILKAN DATA KONSUL DI SINI -->
                            <?php
                            require 'config/koneksi.php';
                            
                            $query = "SELECT dokter.nama, konsultasi.subject, konsultasi.pertanyaan, konsultasi.jawaban FROM konsultasi inner join dokter on dokter.id = id_dokter";
                            $result = mysqli_query($mysqli, $query);

                            while ($data = mysqli_fetch_assoc($result)) {
                                # code...  
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_poli'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['hari'] ?></td>
                                <td><?php echo $data['jam_mulai'] ?></td>
                                <td><?php echo $data['jam_selesai'] ?></td>
                                <td><?php echo $data['no_antrian'] ?></td>
                                <td>
                                    <a href="detailDaftarPoli.php?id=<?php echo $data['idDaftarPoli'] ?>"
                                        class='btn btn-sm btn-success edit-btn'>Detail</a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>

</div>