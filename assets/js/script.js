// Data Member
// function dataMember() {
$(document).ready(function () {
    url = 'member/get';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            // console.log(result.member.id_kab);

            idProv  = result.member.id_prov;
            idKab   = result.member.id_kab;
            idKec   = result.member.id_kec;

        }
    });
});
// }


// ALamat/Wilayah 
$(document).ready(function () {

    $("#provinsi").append('<option value="">Pilih</option>');
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    // $("#kelurahan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    url = 'general/provinsi';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            result.forEach(function (data) {

                if (data.id_prov == idProv) {
                    $("#provinsi").append('<option value="' + data.id_prov + '" selected>' + data.nama_prov + '</option>');

                    $("#provinsi").change();
                } else {
                    $("#provinsi").append('<option value="' + data.id_prov + '">' + data
                        .nama_prov + '</option>');
                }

            });
        }
    });
});
$("#provinsi").change(function () {
    var id_prov = $("#provinsi").val();
    var url = 'general/kabupaten/' + id_prov;
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    // $("#kelurahan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            result.forEach(function (data) {

                if (data.id_kab == idKab) {
                    $("#kabupaten").append('<option value="' + data.id_kab + '" selected >' + data.nama_kab + '</option>');

                    $("#kabupaten").change();
                } else {
                    $("#kabupaten").append('<option value="' + data.id_kab + '">' + data
                        .nama_kab + '</option>');
                }

            });
        }
    });
});
$("#kabupaten").change(function () {
    var id_kab = $("#kabupaten").val();
    var url = 'general/kecamatan/' + id_kab;
    $("#kecamatan").html('');
    $("#kelurahan").html('');
    $("#kecamatan").append('<option value="">Pilih</option>');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            result.forEach(function (data) {

                if (data.id_kec == idKec) {
                    $("#kecamatan").append('<option value="' + data.id_kec + '" selected >' + data.nama_kec + '</option>');
                } else {
                    $("#kecamatan").append('<option value="' + data.id_kec + '">' + data
                        .nama_kec + '</option>');
                }

            });
        }
    });
});

// <!-- Tanggal -->
$(document).ready(function () {
    $('.tanggal').datepicker({
        format: "dd-mm-yyyy",
        changeMonth: true,
        changeYear: true,
        autoclose: true
    });
});

// kategori keahlian
$(document).ready(function () {
    $("#kategori-keahlian").append('<option value="">Pilih</option>');
    url = 'general/kategori';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            result.forEach(function (data) {
                $("#kategori-keahlian").append('<option value="' + data.id_kategori + '">' + data.nama_kategori_keahlian + '</option>');
            });
        }
    });
});

// list keahlian
$(document).ready(function () {
    $("#kategori-keahlian").change(function () {
        var id_kategori = $("#kategori-keahlian").val();
        var url = 'general/list_keahlian/' + id_kategori;
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                result.forEach(function (data) {
                    $("#list-keahlian").append('<div class="col-md-6"><label class="checkbox-inline"><input type="checkbox" name="list-keahlian[]" value="' + data.id_list_keahlian + '">' + data.nama_keahlian + '</label><div>')
                });
            }
        });
    });
});