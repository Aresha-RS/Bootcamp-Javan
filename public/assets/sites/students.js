App = {
    baseUrl: "",
    init: function() {
        let self = this;
        $(function() {

            self.fetch();
            var error = false;

            $('#modal-create-students').on('shown.bs.modal', function() {
                $('#nama').trigger("focus");
            });

            $("#btn-save-students").on("click", function() {
                var nama = $("#nama").val();
                var nis = $("#nis").val();
                var kelas = $("#kelas").val();
                var jurusan = $("#kejuruan").val();
                var email = $("#email").val();
                var telepon = $("#telepon").val();
                var alamat = $("#alamat").val();

                if (nama == null || nama == undefined || nama == "") {
                    error = true;
                    $("#error-nama").text("Nama siswa tidak boleh kosong..!");
                }

                if (nis !== "" || nis.length > 0) {
                    if (isNaN(nis)) {
                        error = true;
                        $("#error-nis").html("Nis siswa harus angka !");
                    }

                    if (nis.length < 6) {
                        error = true;
                        $("#error-nis").html("Nis minimal 6 digit dan maksimal 8 angka !");
                    }

                } else {
                    error = true;
                    $("#error-nis").html("Nis harus diisi !");
                }

                if (kelas == null || kelas == undefined || kelas == "") {
                    error = true;
                    $("#error-kelas").text("Kelas tidak boleh kosong..!");
                }

                if (jurusan == null || jurusan == undefined || jurusan == "") {
                    error = true;
                    $("#error-kejuruan").text("Kejuruan tidak boleh kosong..!");
                }

                if (email !== "" || email.length > 0) {
                    pattern = /[.@]/;
                    if (!pattern.test(email)) {
                        error = true;
                        $("#error-email").html("Format penulisan email desa salah !");
                    }
                } else {
                    error = true;
                    $("#error-email").html("Email desa harus diisi !");
                }

                if (telepon !== "" || telepon.length > 0) {
                    if (isNaN(telepon)) {
                        error = true;
                        $("#error-telepon").html("Telepon harus angka !");
                    }

                    if (telepon.length < 8) {
                        error = true;
                        $("#error-telepon").html("Telepon minimal 8 digit angka !");
                    }

                } else {
                    error = true;
                    $("#error-telepon").html("Telepon harus diisi !");
                }

                if (alamat !== "" || alamat.length > 0) {
                    pattern = /[a-zA-Z0-9.-_():]/;
                    if (!pattern.test(alamat)) {
                        error = true;
                        $("#error-alamat").html("Alamat hanya boleh menggunakan huruf dan karakter .-_(): !");
                    }

                    if (alamat.length < 10) {
                        error = true;
                        $("#error-alamat").html("Alamat minimal 10 digit karakter !");
                    }
                } else {
                    error = true;
                    $("#error-alamat").html("Alamat harus diisi !");
                }

                var parameter = {
                    nis: nis,
                    nama: nama,
                    kelas: kelas,
                    kejuruan: jurusan,
                    email: email,
                    telepon: telepon,
                    alamat: alamat
                }

                if (!error) {
                    self.save(parameter);
                }
            });

            $("#btn-save-close").on("click", function() {
                self.reset();
            });
        });

    },
    reset: function() {
        $('#modal-create-students').on('hide.bs.modal', function() {
            $("#nis").val("");
            $("#nama").val("");
            $("#kelas").val("");
            $("#kejuruan").val("");
            $("#email").val("");
            $("#telepon").val("");
            $("#alamat").val("");
            $("#error-nis").text("");
            $("#error-nama").text("");
            $("#error-kelas").text("");
            $("#error-kejuruan").text("");
            $("#error-email").text("");
            $("#error-telepon").text("");
            $("#error-alamat").text("");
            $("#error-insert").text("");
        });
    },
    fetch: function() {
        let self = this;
        tableContent = '<tr class="text-center"><td colspan="8" class="text-primary">';
        tableContent += '<i class="fa fas fa-spinner fa-spin"></i> Mohon tunggu sebentar, data sedang diproses..!';
        tableContent += '</td></tr>';
        $("#table-students").html(tableContent);
        setTimeout(function() {
            $.ajax({
                type: "GET",
                url: self.baseUrl + "/school/students/fetch",
                cache: false,
                dataType: "JSON",
                success: function(response) {
                    if (response.success) {
                        tableContent = "";
                        $.each(response.rows, function(key, data) {
                            no = key + 1;
                            html_edit_btn = '<button class="btn btn-success btn-sm" title="Edit Vacations ?" data-placement="top" onclick=\'App.edit(\"' + escape(JSON.stringify(data)) + '\")\'><i class="fa fa-pencil-alt"></i></button>';
                            html_del_btn = '<button class="btn btn-danger btn-sm" title="Delete Vacations ?" data-placement="top" onclick=\'App.delete(\"' + escape(JSON.stringify(data)) + '\")\'><i class="fa fa-trash"></i></button>';
                            tableContent += '<tr>';
                            tableContent += '<td class="text-center">' + no + '</td>';
                            tableContent += '<td>' + data.nis + '</td>';
                            tableContent += '<td>' + data.nama + '</td>';
                            tableContent += '<td>' + data.kelas + '</td>';
                            tableContent += '<td>' + data.name + '</td>';
                            tableContent += '<td>' + data.email + '</td>';
                            tableContent += '<td>' + data.phone + '</td>';
                            tableContent += '<td class="text-center">' + html_edit_btn + html_del_btn + '</td>';
                            tableContent += '</tr>';
                        });
                        $("#table-students").html(tableContent);
                    } else {
                        tableContent = '<tr class="text-center"><td colspan="8" class="text-danger">';
                        tableContent += '<i class="fa fa-warning"></i> ' + response.desc;
                        tableContent += '</td></tr>';
                        $("#table-students").html(tableContent);
                    }
                },
                error: function() {
                    tableContent = '<tr class="text-center"><td colspan="8" class="text-danger">';
                    tableContent += '<i class="fa fa-exclamation-circle"> Internal Server Error !</i> ';
                    tableContent += '</td></tr>';
                    $("#table-students").html(tableContent);
                }
            });
        }, 1000);
    },
    save: function(params) {
        let self = this;
        $.ajax({
            type: "POST",
            url: self.baseUrl + "/school/students/created",
            data: params,
            dataType: "JSON",
            success: function(response) {
                if (response.success) {
                    $("#modal-create-students").modal('hide');
                    self.fetch();
                } else {
                    $("#error-insert").text("Failed to save data..!");
                }
            },
            error: function(err) {
                $("#error-insert").text("Failed to save data..!");
            }
        });
    },
    edit: function(params) {
        let self = this;
        let error = false;

        let record = JSON.parse(unescape(params));
        $("#modal-edit-students").on("shown.bs.modal", function() {
            $("#edit-nama").val(record.nama);
            $("#edit-nis").val(record.nis);
            $("#edit-email").val(record.email);
            $("#edit-telepon").val(record.phone);
            $("#edit-alamat").val(record.alamat);
            $("#edit-kejuruan").val(record.vacation_id);
            $("#edit-kelas").val(record.kelas);
        });
        $("#modal-edit-students").modal("show");

        $("#btn-update-students").on("submit", function() {
            let self = this;
            var nama = $("#edit-nama").val();
            var nis = $("#edit-nis").val();
            var email = $("#edit-email").val();
            var telepon = $("#edit-telepon").val();
            var alamat = $("#edit-alamat").val();
            var jurusan = $("#edit-kejuruan option").val();
            var kelas = $("#edit-kelas").val();

            if (nama == null || nama == undefined || nama == "") {
                error = true;
                $("#error-nama").text("Nama siswa tidak boleh kosong..!");
            }

            if (nis !== "" || nis.length > 0) {
                if (isNaN(nis)) {
                    error = true;
                    $("#error-nis").html("Nis siswa harus angka !");
                }

                if (nis.length < 6) {
                    error = true;
                    $("#error-nis").html("Nis minimal 6 digit dan maksimal 8 angka !");
                }

            } else {
                error = true;
                $("#error-nis").html("Nis harus diisi !");
            }

            if (kelas == null || kelas == undefined || kelas == "") {
                error = true;
                $("#error-kelas").text("Kelas tidak boleh kosong..!");
            }

            if (jurusan == null || jurusan == undefined || jurusan == "") {
                error = true;
                $("#error-kejuruan").text("Kejuruan tidak boleh kosong..!");
            }

            if (email !== "" || email.length > 0) {
                pattern = /[.@]/;
                if (!pattern.test(email)) {
                    error = true;
                    $("#error-email").html("Format penulisan email desa salah !");
                }
            } else {
                error = true;
                $("#error-email").html("Email desa harus diisi !");
            }

            if (telepon !== "" || telepon.length > 0) {
                if (isNaN(telepon)) {
                    error = true;
                    $("#error-telepon").html("Telepon harus angka !");
                }

                if (telepon.length < 8) {
                    error = true;
                    $("#error-telepon").html("Telepon minimal 8 digit angka !");
                }

            } else {
                error = true;
                $("#error-telepon").html("Telepon harus diisi !");
            }

            if (alamat !== "" || alamat.length > 0) {
                pattern = /[a-zA-Z0-9.-_():]/;
                if (!pattern.test(alamat)) {
                    error = true;
                    $("#error-alamat").html("Alamat hanya boleh menggunakan huruf dan karakter .-_(): !");
                }

                if (alamat.length < 10) {
                    error = true;
                    $("#error-alamat").html("Alamat minimal 10 digit karakter !");
                }
            } else {
                error = true;
                $("#error-alamat").html("Alamat harus diisi !");
            }

            var parameter = {
                id: record.id,
                nis: nis,
                nama: nama,
                kelas: kelas,
                kejuruan: jurusan,
                email: email,
                telepon: telepon,
                alamat: alamat
            }

            if (!error) {
                self.update(parameter);
            }
        });
    },
    update: function(params) {
        let self = this;
        $.ajax({
            type: "POST",
            url: self.baseUrl + "/school/students/updated",
            data: params,
            dataType: "JSON",
            success: function(response) {
                if (response.success) {
                    $("#modal-edit-students").modal("hide");
                    self.fetch();
                } else {
                    alert(response.message);
                }
            },
            error: function(err) {
                console.log(err);
                alert("Failed to updated students !");
            }
        })
    },
    delete: function(params) {
        let self = this;
        let record = JSON.parse(unescape(params));
        $("#modal-delete-students").on("shown.bs.modal", function() {
            $("#delete-students-title").text(record.description + " (" + record.name + ")");
        });
        $("#modal-delete-students").modal("show");

        $("#btn-delete-students").on("click", function() {
            $.ajax({
                type: "POST",
                url: self.baseUrl + "/school/students/deleted",
                data: { id: record.id },
                dataType: "JSON",
                success: function(response) {
                    if (response.success) {
                        $("#modal-delete-students").modal("hide");
                        self.fetch();
                    } else {
                        $("#modal-delete-students").modal("hide");
                        alert(response.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                    $("#modal-delete-students").modal("hide");
                    alert("Failed to deleted students !");
                }
            })
        });
    }
}