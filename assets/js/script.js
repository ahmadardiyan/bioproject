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

// Wilayah Provinsi
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

// Wilayah Kabupaten
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

// Wilayah Kecamatan
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

// Tahun
$(document).ready(function () {
    $('.tahun').append('<option value="">Pilih</option>');
    var d = new Date();

    for (var i = d.getFullYear(); i > d.getFullYear()-50; i--) {
        $('.tahun').append('<option value="'+i+'">'+i+'</option>');
    }
});

// Keahlian Member
$(document).ready(function () {

    var url = 'keahlian/getKeahlian/1';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            keahlianMember = result;

            // console.log(keahlianMember);

            result.forEach(function (data) {


                $("#keahlian-member").append('<p class="label label-default" style="margin-right:10px; display:inline-block">' + data.nama_keahlian + '</p>');

                $("#checkbox-keahlian-member").append('<div id="list-keahlian-' + data.id_keahlian + '" class="col-md-6 col-xs-6"><div class="checkbox-inline"><input type="checkbox"  name="keahlian[]"  value="' + data.id_keahlian + '" id="keahlian-' + data.id_keahlian + '" style="margin-right:10px;" checked>' + data.nama_keahlian + '</div></div>');

            });
        }
    });
});

// Kategori Keahlian
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

// List Keahlian
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

                $("#list-keahlian").append('<div class="col-md-6 col-xs-6"><label class="checkbox-inline"><input type="checkbox" class="skill" id="' + data.id_keahlian + '" value="' + data.id_keahlian + '" style="margin-right:10px;" onclick="tambahKeahlian(`' + data.id_keahlian + '`,`' + data.nama_keahlian + '`)" ' + (x == true ? "checked" : "") + '>' + data.nama_keahlian + '</label></div>')

            });
        }
    });
});

// Tambah Keahlian
function tambahKeahlian(id_keahlian, nama_keahlian) {

    var status = $("#" + id_keahlian).is(":checked") ? "1" : "0";

    if (status === '1') {

        $("#checkbox-keahlian-member").append('<div id="list-keahlian-' + id_keahlian + '" class="col-md-6 col-xs-6"><label class="checkbox-inline"><input type="checkbox" class="skill"  name="keahlian[]"  id="' + nama_keahlian + '"  value="' + id_keahlian + '" style="margin-right:10px;" checked> ' + nama_keahlian + '</label><div>');

    } else {

        $("#list-keahlian-" + id_keahlian)[0].remove();
    }

}

// Tambah Sertifikat
$("#btn-create-sertifikat").on('click', function () {
    $("#modal-sertifikat").modal();
    $(".modal-title").html('Tambah Sertifikat');
    $(".modal-body form").attr('action', 'create-sertifikat');
    $('#nama-sertifikat').val('');
    $('#tahun').val('');
    $(".modal-footer button[type=submit]").html('Submit');
});

// Update Sertifikat
$(".btn-update-sertifikat").on('click', function () {
    $("#modal-sertifikat").modal();
    $(".modal-title").html('Edit Sertifikat');
    $(".modal-body form").attr('action', 'update-sertifikat');
    $(".modal-footer button[type=submit]").html('Edit Data');

    const id = $(this).data('id');
    // console.log(id);

    var url = 'member/getSertifikat';
    $.ajax({
        url: url,
        data: {
            id_sertifikat: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $('#id-sertifikat').val(data.id_sertifikat);
            $('#nama-sertifikat').val(data.nama_sertifikat);
            $('#tahun').val(data.tahun);
        }
    });
});

// Tambah Pendidikan
$("#btn-create-pendidikan").on('click', function () {
    $("#modal-pendidikan").modal();
    $(".modal-title").html('Tambah pendidikan');
    $(".modal-body form").attr('action', 'create-pendidikan');
    $('#nama-univ').val('');
    $('#gelar').val('');
    $('#prodi').val('');
    $('.tahun-mulai').val('');
    $('.tahun-selesai').val('');
    $(".modal-footer button[type=submit]").html('Submit');
});

// Update Pendidikan
$(".btn-update-pendidikan").on('click', function () {
    $("#modal-pendidikan").modal();
    $(".modal-title").html('Edit Pendidikan');
    $(".modal-body form").attr('action', 'update-pendidikan');
    $(".modal-footer button[type=submit]").html('Edit Data');

    const id = $(this).data('id');

    var url = 'member/getpendidikan';
    $.ajax({
        url: url,
        data: {
            id_pendidikan: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $('#id-pendidikan').val(data.id_pendidikan);
            $('#nama-univ').val(data.nama_univ);
            $('#gelar').val(data.gelar);
            $('#prodi').val(data.prodi);
            $('.tahun-mulai').val(data.tahun_mulai);
            $('.tahun-selesai').val(data.tahun_selesai);

            console.log(data.tahun_mulai);
            console.log(data.tahun_selesai);
        }
    });
});

// Tambah Pengalaman Kerja
$("#btn-create-pengalaman-kerja").on('click', function () {
    $("#modal-pengalaman-kerja").modal();
    $(".modal-title").html('Tambah Pengalaman Kerja');
    $(".modal-body form").attr('action', 'create-pengalaman-kerja');
    $('#id-pengalaman').val("");
    $('#nama-perusahaan').val("");
    $('#jabatan').val("");
    $('.tahun-mulai').val("");
    $('.tahun-selesai').val("");
    $(".modal-footer button[type=submit]").html('Submit');
});

// Update Pengalaman Kerja
$(".btn-update-pengalaman-kerja").on('click', function () {
    $("#modal-pengalaman-kerja").modal();
    $(".modal-title").html('Edit Pengalaman Kerja');
    $(".modal-body form").attr('action', 'update-pengalaman-kerja');
    $(".modal-footer button[type=submit]").html('Edit Data');

    const id = $(this).data('id');

    var url = 'member/getPengalamanKerja';
    $.ajax({
        url: url,
        data: {
            id_pengalaman: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $('#id-pengalaman').val(data.id_pengalaman);
            $('#nama-perusahaan').val(data.nama_perusahaan);
            $('#jabatan').val(data.jabatan);
            $('.tahun-mulai').val(data.tahun_mulai);
            $('.tahun-selesai').val(data.tahun_selesai);

            console.log(data.tahun_mulai);
            console.log(data.tahun_selesai);
        }
    });
});