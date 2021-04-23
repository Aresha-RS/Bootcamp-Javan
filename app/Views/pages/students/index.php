<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row pb-1">
        <div class="col-lg-12">
            <button type="button" class="btn btn-outline-success btn-square" data-toggle="modal" data-target="#modal-create"><i class="fas fa-user-graduate"></i> Tambah Siswa</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $st) : ?>
                            <tr>
                                <td><?= $st['nis']; ?></td>
                                <td><?= $st['nama']; ?></td>
                                <td><?= $st['kelas']; ?></td>
                                <td><?= $st['kejuruan']; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <strong>Formulir Siswa Baru</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="nama" class="control-label">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="ex. (Recha Abriana)">
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="control-label">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="nis" name="nis" class="form-control" placeholder="ex. 202234001">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="kelas" class="control-label">Kelas <span class="text-danger">*</span></label>
                            <input type="radio" name="kelas" class="form-radio" value="X"> X
                            <input type="radio" name="kelas" class="form-radio" value="XI"> XI
                            <input type="radio" name="kelas" class="form-radio" value="XII"> XII
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="jurusan" class="control-label">Kejuruan <span class="text-danger">*</span></label>
                            <select name="kejuruan" id="kejuruan" class="form-control">
                                <option value="TAK"> Teknik Akuntansi</option>
                                <option value="TAP"> Teknik Administrasi Perkantoran</option>
                                <option value="TKJ"> Teknik Komputer & Jaringan</option>
                                <option value="TKR"> Teknik Kendaraan Ringan</option>
                                <option value="TL"> Teknis Listrik</option>
                                <option value="RPL"> Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="control-label">Email <span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="ex. (recha@basi.ac.id)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="telepon" class="control-label">No. Telepon <span class="text-danger">*</span></label>
                            <input type="text" id="telepon" name="telepon" class="form-control" placeholder="ex. (088213668769)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery/jquery-3.5.1.slim.min.js') ?>"></script>
<script src="<?= base_url('assets/sites/students.js') ?>"></script>
<?= $this->endSection() ?>