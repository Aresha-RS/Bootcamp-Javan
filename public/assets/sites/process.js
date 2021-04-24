$(function() {
    // Define process insert...
    $("#table-vacations").dataTable({
        "bInfo": false,
        "lengthChange": false
    });

    $('#modal-create-vacation').on('shown.bs.modal', function() {
        $('#kode').trigger("focus");
    });

    $('#modal-create-vacation').on('hide.bs.modal', function() {
        $('#nama').val("");
        $("#kode").val("");
    });

    $("#btn-save").on("click", function() {
        var kode = $("#kode").val();
        var nama = $("#nama").val();

        var parameter = {
            kode: kode,
            nama: nama
        }

        $.ajax({
            type: "post",
            url: "/account/vacations/created",
            data: parameter,
            dataType: "JSON",
            success: function(response) {
                if (response.success) {
                    $("#modal-create").hide();
                    alert("Success");
                } else {
                    alert("Error");
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

});