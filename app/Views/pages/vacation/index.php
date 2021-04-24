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
                <table id="table-vacations" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Kejuruan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vacations as $vc) : ?>
                            <tr>
                                <td><?= $vc['name']; ?></td>
                                <td><?= $vc['description']; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nama" class="control-label">Nama Kejuruan <span class="text-danger">*</span></label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="ex. (Teknik Komputer & Jaringan)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" id="btn-save" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>