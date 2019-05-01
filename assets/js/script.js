//Get Data Member
$(document).ready(function () {
    url = 'member/get';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {

            idProv = result.member.id_prov;
            idKab = result.member.id_kab;
            idKec = result.member.id_kec;

        }
    });
});


// Wilayah 
$(document).ready(function () {

    $("#provinsi").append('<option value="">Pilih</option>');
    $("#kabupaten").html('');
    $("#kecamatan").html('');
    $("#kabupaten").append('<option value="">Pilih</option>');
    $("#kecamatan").append('<option value="">Pilih</option>');
    url = 'wilayah/provinsi';
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
    var url = 'wilayah/kabupaten/' + id_prov;
    $("#kabupaten").html('');
    $("#kecamatan").html('');
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
    var url = 'wilayah/kecamatan/' + id_kab;
    $("#kecamatan").html('');
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

// Tanggal
$(document).ready(function () {
    $('.tanggal').datepicker({
        format: "dd-mm-yyyy",
        changeMonth: true,
        changeYear: true,
        autoclose: true
    });
});

// keahlian member
$(document).ready(function () {

    var url = 'keahlian/getKeahlianMember/1';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            keahlianMember = result;

            // console.log(keahlianMember);

            result.forEach(function (data) {


                $("#keahlian-member").append('<p class="label label-default" style="margin-right:10px; display:inline-block">' + data.nama_keahlian + '</p>');

                $("#select-keahlian-member").append('<div class="col-md-6 col-xs-6"><div class="checkbox-inline"><input type="checkbox" name="inputKeahlian" value="' + data.id_list_keahlian + '" id="inputKeahlian" style="margin-right:10px;" checked>' + data.nama_keahlian + '</div></div>');

            });
        }
    });
});

// kategori keahlian
$(document).ready(function () {
    $("#kategori-keahlian").append('<option value="">Pilih</option>');

    url = 'keahlian/kategoriKeahlian';
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
$("#kategori-keahlian").change(function () {

    $("#list-keahlian").html('');
    var id_kategori = $("#kategori-keahlian").val();
    var url = 'keahlian/listKeahlian/' + id_kategori;
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            result.forEach(function (data) {
                var x = false;

                keahlianMember.forEach(function (keahlian) {

                    if (data.id_keahlian == keahlian.id_keahlian) {
                        x = true;
                    }

                });

                if (x == true) {
                    $("#list-keahlian").append('<div class="col-md-6 col-xs-6"><label class="checkbox-inline"><input type="checkbox" name="skill[]" class="skill" value="' + data.id_keahlian + '" style="margin-right:10px;" checked>' + data.nama_keahlian + '</label></div>')
                } else {
                    $("#list-keahlian").append('<div class="col-md-6 col-xs-6"><label class="checkbox-inline"><input type="checkbox" name="skill[]" class="skill" value="' + data.id_keahlian + '" style="margin-right:10px;">' + data.nama_keahlian + '</label></div>')
                }

            });
        }
    });
});

$("#list-keahlian").change(function () {
    console.log($(this));
    // $(this).css("color","red");
    $(this).css("color", "red");

    $("#select-keahlian-member").append('<div class="col-md-6 col-xs-6"><label class="checkbox-inline"><input type="checkbox" name="skill[]" class="skill" value="" style="margin-right:10px;" checked onclick="checkedKeahlian()"> haha </label><div>')
});
