// <!-- Get Select Alamat -->

// console.log("berhasil"); 

$(document).ready(function () {
    $("#provinsi").append('<option value="">Pilih</option>');
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    $("#kelurahan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    url = 'general/provinsi';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            for (var i = 0; i < result.length; i++) {
                // if (result[i].id_prov == <?=set_value('provinsi')?>) {
                // 	$("#provinsi").append('<option value="' + result[i].id_prov + '" selected >' + result[i].nama_prov + '</option>');
                // } else {
                $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i]
                    .nama_prov + '</option>');
                // }
            }
        }
    });
});
$("#provinsi").change(function () {
    var id_prov = $("#provinsi").val();
    var url = 'general/kabupaten/' + id_prov;
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    $("#kelurahan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            for (var i = 0; i < result.length; i++) {
                // if (result[i].id_kab == set_value)
                $("#kabupaten").append('<option value="' + result[i].id_kab + '">' + result[i]
                    .nama_kab + '</option>');
            }
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
            for (var i = 0; i < result.length; i++)
                $("#kecamatan").append('<option value="' + result[i].id_kec + '">' + result[i]
                    .nama_kec + '</option>');
        }
    });
});

// <!-- Datepicker -->

$(document).ready(function () {
    $('.tanggal').datepicker({
        format: "dd-mm-yyyy",
        changeMonth: true,
        changeYear: true,
        autoclose: true
    });
});

$(document).ready(function () {
    url = 'general/skills';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            for (var i = 0; i < result.length; i++) {
                // console.log(i);
                $("#list-skills").append('<div class="col-md-6"><label class="checkbox-inline"><input type="checkbox" name="skill[]" value="'+ result[i].id_daftar_keahlian +'">'+ result[i].nama_keahlian +'</label><div>');
            }
        }
    });
});