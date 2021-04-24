<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row pb-1">
        <div class="col-lg-12">
            <button type="button" class="btn btn-outline-success btn-square" data-toggle="modal" data-target="#modal-create-vacation"><i class="fas fa-file-signature"></i> Tambah Kejuruan</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kejuruan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-vacations">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-create-vacation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <strong>Formulir Kejuruan Baru</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="kode" class="control-label">Kode Kejuruan <span class="text-danger">*</span></label>
                            <input type="text" id="kode" name="kode" class="form-control" placeholder="ex. (TKJ)">
                            <span id="error-kode" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nama" class="control-label">Nama Kejuruan <span class="text-danger">*</span></label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="ex. (Teknik Komputer & Jaringan)">
                            <span id="error-nama" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" id="btn-save" class="btn btn-primary">Simpan</button>
                            <button type="button" id="btn-cancel" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-vacation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <strong>Formulir Edit Kejuruan</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="kode" class="control-label">Kode Kejuruan <span class="text-danger">*</span></label>
                            <input type="text" id="edit-kode" name="kode" class="form-control" placeholder="ex. (TKJ)">
                            <span id="edit-error-kode" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nama" class="control-label">Nama Kejuruan <span class="text-danger">*</span></label>
                            <input type="text" id="edit-nama" name="nama" class="form-control" placeholder="ex. (Teknik Komputer & Jaringan)">
                            <span id="edit-error-nama" class="text-danger small"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <span class="text-danger small" id="edit-error-update"></span>
                            <button type="button" id="btn-update" class="btn btn-primary">Simpan</button>
                            <button type="button" id="btn-cancel" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h4 class="text-center">YAKIN HAPUS ?</h4>
                            <p>Apakah anda yakin akan menghapus <span id="delete-title"></span> ?</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-right">
                            <button type="button" id="btn-delete" class="btn btn-danger">Ya, hapus</button>
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
<script src="<?= base_url('assets/sites/vacations.js') ?>"></script>
<script type="text/javascript">
    App.baseUrl = "<?= site_url() ?>";
    App.init();
</script>
<?= $this->endSection() ?>