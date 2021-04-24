<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row pb-1">
        <div class="col-lg-12">
            <button type="button" class="btn btn-outline-success btn-square" data-toggle="modal" data-target="#modal-create-students"><i class="fas fa-user-graduate"></i> Tambah Siswa</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-students">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal  Add -->
    <div class="modal fade" id="modal-create-students" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                            <span id="error-nama" class="text-danger small"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="control-label">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="nis" name="nis" class="form-control" placeholder="ex. 202234001">
                            <span id="error-nis" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="kelas" class="control-label">Kelas <span class="text-danger">*</span></label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value=""> -- Pilih Kelas --</option>
                                <option value="X"> X (Sepuluh)</option>
                                <option value="XI"> XI (Sebelas)</option>
                                <option value="XII"> XII (Dua Belas)</option>
                            </select>
                            <span id="error-kelas" class="text-danger small"></span>
                        </div>
                        <div class="col-md-8">
                            <label for="jurusan" class="control-label">Kejuruan <span class="text-danger">*</span></label>
                            <select name="kejuruan" id="kejuruan" class="form-control">
                                <option value=""> -- Pilih Kejuruan --</option>
                                <?php foreach ($vacations as $st) : ?>
                                    <option value="<?= $st['id'] ?>"><?= $st['description'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span id="error-kejuruan" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="control-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="ex. (recha@basi.ac.id)">
                            <span id="error-email" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="telepon" class="control-label">No. Telepon <span class="text-danger">*</span></label>
                            <input type="text" id="telepon" name="telepon" class="form-control" placeholder="ex. (088213668769)">
                            <span id="error-telepon" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="alamat" class="control-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl. Tawang Sari, Tasikmalaya"></textarea>
                            <span id="error-alamat" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <span id="error-insert" class="text-danger small"></span>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="btn-save-students" class="btn btn-primary">Simpan</button>
                            <button type="button" id="btn-save-close" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit-students" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                            <input type="text" id="edit-nama" name="nama" class="form-control" placeholder="ex. (Recha Abriana)">
                            <span id="error-edit-nama" class="text-danger small"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="control-label">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="edit-nis" name="nis" class="form-control" placeholder="ex. 202234001">
                            <span id="error-edit-nis" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="kelas" class="control-label">Kelas <span class="text-danger">*</span></label>
                            <select name="kelas" id="edit-kelas" class="form-control">
                                <option value=""> -- Pilih Kelas --</option>
                                <option value="X"> X (Sepuluh)</option>
                                <option value="XI"> XI (Sebelas)</option>
                                <option value="XII"> XII (Dua Belas)</option>
                            </select>
                            <span id="error-edit-kelas" class="text-danger small"></span>
                        </div>
                        <div class="col-md-8">
                            <label for="jurusan" class="control-label">Kejuruan <span class="text-danger">*</span></label>
                            <select name="kejuruan" id="edit-kejuruan" class="form-control">
                                <option value=""> -- Pilih Kejuruan --</option>
                                <?php foreach ($vacations as $st) : ?>
                                    <option value="<?= $st['id'] ?>"><?= $st['description'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span id="error-edit-kejuruan" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="control-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="edit-email" name="email" class="form-control" placeholder="ex. (recha@basi.ac.id)">
                            <span id="error-edit-email" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="telepon" class="control-label">No. Telepon <span class="text-danger">*</span></label>
                            <input type="text" id="edit-telepon" name="telepon" class="form-control" placeholder="ex. (088213668769)">
                            <span id="error-edit-telepon" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="alamat" class="control-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="edit-alamat" class="form-control" placeholder="Jl. Tawang Sari, Tasikmalaya"></textarea>
                            <span id="error-edit-alamat" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <span id="error-update" class="text-danger small"></span>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="btn-update-students" class="btn btn-primary">Simpan</button>
                            <button type="button" id="btn-update-close" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal-delete-students" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h4 class="text-center">YAKIN HAPUS ?</h4>
                            <p>Apakah anda yakin akan menghapus <span id="students-title"></span> ?</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="btn-delete-students" class="btn btn-danger">Ya, hapus</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lodash/lodash.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets//plugins/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets//plugins/datatable/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/sites/students.js') ?>"></script>
<script type="text/javascript">
    App.baseUrl = "<?= site_url() ?>";
    App.init();
</script>
<?= $this->endSection() ?>