App = {
    baseUrl: "",
    init: function() {
        let self = this;
        $(function() {

            self.fetch();
            var error = false;

            $('#modal-create-vacation').on('shown.bs.modal', function() {
                $('#kode').trigger("focus");
            });

            $("#btn-save").on("click", function() {
                var kode = $("#kode").val();
                var nama = $("#nama").val();

                if (kode == null || kode == undefined) {
                    error = true;
                    $("#error-kode").text("Kode tidak boleh kosong..!");
                }

                if (nama == null || nama == undefined) {
                    error = true;
                    $("#error-nama").text("Nama kejuruan tidak boleh kosong..!");
                }

                var parameter = {
                    kode: kode,
                    nama: nama
                }

                if (!error) {
                    self.save(parameter);
                }
            });

            $("#btn-cancel").on("click", function() {
                self.reset();
            });
        });

    },
    reset: function() {
        $('#modal-create-vacation').on('hide.bs.modal', function() {
            $("#kode").val("");
            $("#nama").val("");
            $("#error-kode").text("");
            $("#error-nama").text("");
            $("#error-saving").text("");
            $("#edit-kode").val("");
            $("#edit-nama").val("");
            $("#edit-error-kode").text("");
            $("#edit-error-nama").text("");
            $("#edit-error-update").text("");
        });
    },
    fetch: function() {
        let self = this;
        tableContent = '<tr class="text-center"><td colspan="6" class="text-primary">';
        tableContent += '<i class="fa fas fa-spinner fa-spin"></i> Mohon tunggu sebentar, data sedang diproses..!';
        tableContent += '</td></tr>';
        $("#table-vacations").html(tableContent);
        setTimeout(function() {
            $.ajax({
                type: "GET",
                url: self.baseUrl + "/school/vacations/fetch",
                cache: false,
                dataType: "JSON",
                success: function(response) {
                    if (response.success) {
                        tableContent = "";
                        $.each(response.rows, function(key, data) {
                            no = key + 1;
                            html_edit_btn = '<button class="btn btn-success btn-xs" title="Edit Vacations ?" data-placement="top" onclick=\'App.edit(\"' + escape(JSON.stringify(data)) + '\")\'><i class="fa fa-pencil-alt"></i></button>';
                            html_del_btn = '<button class="btn btn-danger btn-xs" title="Delete Vacations ?" data-placement="top" onclick=\'App.delete(\"' + escape(JSON.stringify(data)) + '\")\'><i class="fa fa-trash"></i></button>';
                            tableContent += '<tr>';
                            tableContent += '<td class="text-center">' + no + '</td>';
                            tableContent += '<td>' + data.name + '</td>';
                            tableContent += '<td>' + data.description + '</td>';
                            tableContent += '<td class="text-center">' + html_edit_btn + html_del_btn + '</td>';
                            tableContent += '</tr>';
                        });
                        $("#table-vacations").html(tableContent);
                    } else {
                        tableContent = '<tr class="text-center"><td colspan="4" class="text-danger">';
                        tableContent += '<i class="fa fa-warning"></i> ' + response.desc;
                        tableContent += '</td></tr>';
                        $("#table-vacations").html(tableContent);
                    }
                },
                error: function() {
                    tableContent = '<tr class="text-center"><td colspan="6" class="text-danger">';
                    tableContent += '<i class="fa fa-exclamation-circle"> Internal Server Error !</i> ';
                    tableContent += '</td></tr>';
                    $("#table-vacations").html(tableContent);
                }
            });
        }, 1000);
    },
    save: function(params) {
        let self = this;
        $.ajax({
            type: "POST",
            url: self.baseUrl + "/school/vacations/created",
            data: params,
            dataType: "JSON",
            success: function(response) {
                if (response.success) {
                    $("#modal-create-vacation").modal('hide');
                    self.fetch();
                } else {
                    $("#error-saving").text("Failed to save data..!");
                }
            },
            error: function(err) {
                $("#error-saving").text("Failed to save data..!");
            }
        });
    },
    edit: function(params) {
        let error = false;
        let self = this;
        let record = JSON.parse(unescape(params));
        $("#modal-edit-vacation").on("shown.bs.modal", function() {
            $("#edit-kode").val(record.name);
            $("#edit-nama").val(record.description);
        });
        $("#modal-edit-vacation").modal("show");
        $("#btn-update").on("click", function() {
            var kode = $("#edit-kode").val();
            var nama = $("#edit-nama").val();
            if (kode == null || kode == undefined) {
                error = true;
                $("#edit-error-kode").text("Kode tidak boleh kosong..!");
            }

            if (nama == null || nama == undefined) {
                error = true;
                $("#edit-error-nama").text("Nama kejuruan tidak boleh kosong..!");
            }

            var parameter = {
                id: record.id,
                kode: kode,
                nama: nama
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
            url: self.baseUrl + "/school/vacations/updated",
            data: params,
            dataType: "JSON",
            success: function(response) {
                if (response.success) {
                    $("#modal-edit-vacation").modal("hide");
                    self.fetch();
                } else {
                    alert(response.message);
                }
            },
            error: function(err) {
                console.log(err);
                alert("Failed to deleted vacation !");
            }
        })
    },
    delete: function(params) {
        let self = this;
        let record = JSON.parse(unescape(params));
        $("#modal-delete").on("shown.bs.modal", function() {
            $("#delete-title").text(record.description + " (" + record.name + ")");
        });
        $("#modal-delete").modal("show");

        $("#btn-delete").on("click", function() {
            $.ajax({
                type: "POST",
                url: self.baseUrl + "/school/vacations/deleted",
                data: { id: record.id },
                dataType: "JSON",
                success: function(response) {
                    if (response.success) {
                        $("#modal-delete").modal("hide");
                        self.fetch();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("Failed to deleted vacation !");
                }
            })
        });
    }
}