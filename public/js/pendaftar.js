var fileId = 1;
// Removes an element from the document
function removeElement(elementId) {
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}
$('input[name="nama"]').on('change', function () {
    let nama = $('input[name="nama"]').val();
    $('#namaKeluarga').val(nama);
});
$('#tanggalinput')
    .datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true
    })
    .datepicker('setDate', 'now')
$('.provinsi').select2({
    placeholder: 'Select Provinsi',
    allowClear: true,
    dropdownCssClass: 'fontSelect'
})
$('.kabupaten').select2({
    placeholder: 'Select Kabupaten',
    allowClear: true,
    dropdownCssClass: 'fontSelect'
})
$('.kecamatan').select2({
    placeholder: 'Select Kecamatan',
    allowClear: true,
    dropdownCssClass: 'fontSelect'
})
$('.desa').select2({
    placeholder: 'Select Desa',
    allowClear: true,
    dropdownCssClass: 'fontSelect'
});
// Form Alamat Sekarang
function breadcrumbSekarang() {
    $('#breadcrumbSekarang li').remove()
    let p = document.getElementsByName('provinsi1')[0]
    let k = document.getElementsByName('kabupaten1')[0]
    let ke = document.getElementsByName('kecamatan1')[0]
    let d = document.getElementsByName('desa1')[0]
    $('#breadcrumbSekarang').append(
        '<li class="breadcrumb-item">' +
        p.options[p.selectedIndex].text +
        '</li>'
    )
    if (k.length >= 1) {
        $('#breadcrumbSekarang').append(
            '<li class="breadcrumb-item">' +
            k.options[k.selectedIndex].text +
            '</li>'
        )
    }
    if (ke.length >= 1) {
        $('#breadcrumbSekarang').append(
            '<li class="breadcrumb-item">' +
            ke.options[ke.selectedIndex].text +
            '</li>'
        )
    }
    if (d.length >= 1) {
        $('#breadcrumbSekarang').append(
            '<li class="breadcrumb-item">' +
            d.options[d.selectedIndex].text +
            '</li>'
        )
    }
}

$('select[name="provinsi1"]').on('change', function () {
    var id = $(this).val()
    getAPIOl(id, 'kabupaten', 'select[name="kabupaten1"]');
    breadcrumbSekarang();
});
$('select[name="kabupaten1"]').on('change', function () {
    var id = $(this).val();
    getAPIOl(id, 'kecamatan', 'select[name="kecamatan1"]');
    breadcrumbSekarang();
});
$('select[name="kecamatan1"]').on('change', function () {
    var id = $(this).val();
    getAPIOl(id, 'desa', 'select[name="desa1"]');
    breadcrumbSekarang();
});
$('select[name="desa1"]').on('change', function () {
    breadcrumbSekarang();
});
$('#dataSekarang').on('click', function () {
    let x = document.getElementById('dataSekarang')
    if (x.textContent == 'Hapus Data') {
        x.innerHTML = 'Tambah Data Alamat Sekarang lebih rinci'
        $('#breadcrumbSekarang li').remove()
        $('select[name="provinsi1"]').empty()
        $('select[name="kabupaten1"]').empty()
        $('select[name="kecamatan1"]').empty()
        $('select[name="desa1"]').empty()
    } else {
        x.innerHTML = 'Hapus Data'
    }
});

// Form Alamat Asal
function breadcrumbAsal() {
    $('#breadcrumbAsal li').remove()
    let p = document.getElementsByName('provinsi2')[0]
    let k = document.getElementsByName('kabupaten2')[0]
    let ke = document.getElementsByName('kecamatan2')[0]
    let d = document.getElementsByName('desa2')[0]
    $('#breadcrumbAsal').append(
        '<li class="breadcrumb-item">' +
        p.options[p.selectedIndex].text +
        '</li>'
    )
    if (k.length >= 1) {
        $('#breadcrumbAsal').append(
            '<li class="breadcrumb-item">' +
            k.options[k.selectedIndex].text +
            '</li>'
        )
    }
    if (ke.length >= 1) {
        $('#breadcrumbAsal').append(
            '<li class="breadcrumb-item">' +
            ke.options[ke.selectedIndex].text +
            '</li>'
        )
    }
    if (d.length >= 1) {
        $('#breadcrumbAsal').append(
            '<li class="breadcrumb-item">' +
            d.options[d.selectedIndex].text +
            '</li>'
        )
    }
}
$(function() {
    getAPIOLAll('provinsi','select[name="provinsi1"]');
    getAPIOLAll('provinsi','select[name="provinsi2"]');
});
$('select[name="provinsi2"]').on('change', function () {
    var id = $(this).val()
    getAPIOl(id, 'kabupaten', 'select[name="kabupaten2"]');
    breadcrumbAsal();
});
$('select[name="kabupaten2"]').on('change', function () {
    var id = $(this).val();
    getAPIOl(id, 'kecamatan', 'select[name="kecamatan2"]');
    breadcrumbAsal();
});
$('select[name="kecamatan2"]').on('change', function () {
    var id = $(this).val();
    getAPIOl(id, 'desa', 'select[name="desa2"]');
    breadcrumbAsal();
});
$('select[name="desa2"]').on('change', function () {
    breadcrumbAsal();
});
$('#dataAsal').on('click', function () {
    let x = document.getElementById('dataAsal')
    if (x.textContent == 'Hapus Data') {
        x.innerHTML = 'Tambah Data Alamat Asal lebih rinci'
        $('#breadcrumbAsal li').remove()
        $('select[name="provinsi2"]').empty()
        $('select[name="kabupaten2"]').empty()
        $('select[name="kecamatan2"]').empty()
        $('select[name="desa2"]').empty()
    } else {
        x.innerHTML = 'Hapus Data'
    }
});
function getAPIOLAll(url, element){
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $(element).empty()
            $(element).append('<option value="">Select</option>')
            $.each(data, function (key, value) {
                $(element).append('<option value="' + value.id + '">' + value.nama + '</option>')
            })
        }
    })
}

// function call api
function getAPIOl(id, url, element) {
    if (id) {
        $.ajax({
            url: url + '/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(element).empty()
                $(element).append('<option value="">Select</option>')
                $.each(data, function (key, value) {
                    $(element).append('<option value="' + value.id + '">' + value.nama + '</option>')
                })
            },
            error: err => console.log(err),
        })
    } else {
        $(element).empty()
        $(element).append('<option value="">Select</option>')
    }
}



// Form Kepemilikan Aset Pribadi
$('input[name="unggas"]').TouchSpin({
    min: 0,
    max: 100,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
})
$('input[name="kambing"]').TouchSpin({
    min: 0,
    max: 100,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
})
$('input[name="sapi"]').TouchSpin({
    min: 0,
    max: 100,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
})
$('input[name="nilaiSimpanan"]').on('change', function () {
    $("#simpanan1").prop("checked", true);
    $("#simpanan1").val($('input[name="nilaiSimpanan"]').val());
});
$('input[id="simpanan1"]').on('change', function () {
    $('input[name="nilaiSimpanan"]').prop('required', true);
});
$('input[id="simpanan2"]').on('change', function () {
    $('input[name="nilaiSimpanan"]').val('').prop('required', false).removeClass("is-valid").removeClass("is-invalid");;
});



// Profil Keluarga
// $('.hubungan').select2({
//     placeholder: 'Hubungan Dalam Keluarga',
//     allowClear: true
// })
// $('.status').select2({
//     placeholder: 'Status Perkawinan',
//     allowClear: true
// })
// $('.pendidikan').select2({
//     placeholder: 'Pendidikan Terakhir',
//     allowClear: true
// })
$("button#addDataKeluarga").on("click", function () {
    fileId++;
    let formKeluarga = `
    <div class="col-lg-6 dataKeluarga" id="dataKeluarga-` + fileId + `">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Keluarga ` + fileId + `</h6>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="javascript:removeElement('dataKeluarga-` + fileId + `');">
                                            <i class="fas fa-xs fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="namaKeluarga[]" class="form-control"
                                                    id="namaKeluarga-` + fileId + `" placeholder="Nama Keluarga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Umur</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="umur[]" class="form-control" placeholder="Umur"
                                                    min="1" id="umur-` + fileId + `">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Hubungan</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="hubungan-` + fileId + ` form-control" name="hubungan[]" id="hubungan-` + fileId + `">
                                                        <option value="">Select</option>
                                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                        <option value="Suami">Suami</option>
                                                        <option value="Istri">Istri</option>
                                                        <option value="Anak">Anak</option>
                                                        <option value="Menantu">Menantu</option>
                                                        <option value="Cucu">Cucu</option>
                                                        <option value="Orang Tua">Orang Tua</option>
                                                        <option value="Mertua">Mertua</option>
                                                        <option value="Famili">Famili</option>
                                                        <option value="Pembantu">Pembantu</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="status-` + fileId + ` form-control" name="status[]" id="status-` + fileId + `">
                                                        <option value="" selected disabled>Status Perkawinan</option>
                                                        <option value="Kawin">Kawin</option>
                                                        <option value="Belum Kawin">Belum Kawin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-center" style="margin-top:-15px;">
                                                Pekerjaan
                                            </p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Pekerjaan Utama"
                                                        name="pekerjaanUtama[]" id="pekerjaanUtama-` + fileId + `">

                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Pekerjaan Sampingan" name="pekerjaanSampingan[]" id="pekerjaanSampingan-` + fileId + `">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="pendidikan-` + fileId + ` form-control" name="pendidikan[]" id="pendidikan-` + fileId + `">
                                                        <option value="" selected disabled>Pendidikan Terakhir</option>
                                                        <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
                                                        <option value="Belum Tamat SD / Sederajat">Belum Tamat SD /
                                                            Sederajat
                                                        </option>
                                                        <option value="Tamat SD / Sederajat">Tamat SD / Sederajat</option>
                                                        <option value="SLTP / Sederajat">SLTP / Sederajat</option>
                                                        <option value="SLTA / Sederajat">SLTA / Sederajat</option>
                                                        <option value="Diploma I">Diploma I / II</option>
                                                        <option value="Akademi / Diploma III / S. Muda">Akademi / Diploma
                                                            III /
                                                            S. Muda</option>
                                                        <option value="Diploma IV / Strata I">Diploma IV / Strata I</option>
                                                        <option value="Strata II">Strata II</option>
                                                        <option value="Strata III">Strata III</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea name="keteranganKeluarga[]" class="form-control" rows="2" id="keterangan-` + fileId + `"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    `;
    $(".dataKeluarga:last").after(formKeluarga);
    // $('.hubungan-' + fileId).select2({
    //     placeholder: "Hubungan Dalam Keluarga",
    //     allowClear: true
    // });
    // $('.status-' + fileId).select2({
    //     placeholder: "Status Perkawinan",
    //     allowClear: true
    // });
    // $('.pendidikan-' + fileId).select2({
    //     placeholder: "Pendidikan Terakhir",
    //     allowClear: true
    // });
})

// Keuangan Keluarga
$("button#addPendapatanKeluarga").on("click", function () {
    fileId++;
    let formPenghaslan = `<div class="form-group row penghasilan" id="penghasilan-` + fileId + `">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="namaPenghasilan[]" id="namaPenghasilan-` + fileId + `" placeholder="Nama Penghasilan Lain">
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="penghasilanBaru[]" id="penghasilanBaru-` + fileId + `" placeholder="Rp/*hari/bulan">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="javascript:removeElement('penghasilan-` +
        fileId + `'); return false;">
                                    <i class="fas fa-xs fa-trash"></i>
                                </button>
                                </div>
                                <label id="penghasilanBaru-` + fileId + `-error" class="invalid-feedback" for="penghasilanBaru-` + fileId + `" style=""></label>
                            </div>
                        </div>
                    </div>`;
    $(".penghasilan:last").after(formPenghaslan);
});
$("button#addPengeluaranKeluarga").on("click", function () {
    fileId++;
    let formPengeluaran = `<div class="form-group row pengeluaran" id="pengeluaran-` + fileId +
        `">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="namaPengeluaran[]" id="namaPengeluaran-` + fileId + `" placeholder="Nama Pengeluaran Lain">
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="pengeluaranBaru[]" id="pengeluaranBaru-` + fileId + `" placeholder="Rp/*hari/bulan">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="javascript:removeElement('pengeluaran-` +
        fileId + `'); return false;">
                                    <i class="fas fa-xs fa-trash"></i>
                                </button>
                                </div>
                                <label id="pengeluaranBaru-` + fileId + `-error" class="invalid-feedback" for="pengeluaranBaru-` + fileId + `" style=""></label>
                            </div>
                        </div>
                    </div>`;
    $(".pengeluaran:last").after(formPengeluaran);

});

// Keterlibatan Dalam Program Lain
$('input[name="isPinjam"]').on('change', function () {
    if($('input[name="isPinjam"]:checked').val() == "Tidak"){
        $('input[name="namaLembaga"]').prop( "checked", false );
        $('input[name="besarPinjaman"]').val('')
        $('input[name="caraPengembalian"]').prop( "checked", false );
        $('input[name="lamaPinjam"]').val('')
        $('input[name="pinjamPer"]').prop( "checked", false );
        $('input[name="totalPinjam"]').val('')
        $('input[name="isLunas"]').val('')
        $('#formIsPinjam').slideUp();
    }else{
        $('#formIsPinjam').slideDown();
    }
});

$('input[name="namaLembagaInput"]').on('change', function () {
    $("#namaLembaga3").prop("checked", true);
    $("#namaLembaga3").val($('input[name="namaLembagaInput"]').val());
});
$('#namaLembaga3').on('change', function () {
    $('input[name="namaLembagaInput"]').prop('required', true);
});
$('#namaLembaga1').on('change', function () {
    $('input[name="namaLembagaInput"]').val('').prop('required', false).removeClass("is-valid").removeClass("is-invalid");;
});
$('#namaLembaga2').on('change', function () {
    $('input[name="namaLembagaInput"]').val('').prop('required', false).removeClass("is-valid").removeClass("is-invalid");;
});


// Validation Form
$('#pendaftar').validate({
    onkeyup: function (element) { $(element).valid() },
    onclick: function (element) { $(element).valid() },
    rules: {
        nama: { required: true },
        alamatsekarang: { required: true },
        alamatasal: { required: true },
        program: { required: true },
        km: { required: true },
        ukuranRumah: { required: true },
        dinding: { required: true },
        lantai: { required: true },
        atap: { required: true },
        kepemilikanRumah: { required: true },
        dapur: { required: true },
        kursi: { required: true },
        kebun: { required: true },
        elektronik: { required: true },
        kendaraan: { required: true },
        simpanan: { required: true },
        'namaKeluarga[]': { required: true },
        'umur[]': { required: true },
        'hubungan[]': { required: true },
        'status[]': { required: true },
        'pekerjaanUtama[]': { required: true },
        'pendidikan[]': { required: true },
        penghasilanPokok: { required: true },
        penghasilanSimpanan: { required: true },
        penghasilanSuami: { required: true },
        penghasilanAnak: { required: true },
        'namaPenghasilan[]': { required: true },
        'penghasilanBaru[]': { required: true },
        kebutuhanDapur: { required: true },
        pengeluaranPendidikan: { required: true },
        pengeluaranKesehatan: { required: true },
        pengeluaranTransportasi: { required: true },
        pengeluaranIuranRutin: { required: true },
        'namaPengeluaran[]': { required: true },
        'pengeluaranBaru[]': { required: true },
        isPinjam: { required: true },
        namaLembaga: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        besarPinjaman: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        caraPengembalian: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        lamaPinjam: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        totalPinjam:{ required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        pinjamPer: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        isLunas: { required: function(){ return $('input[name="isPinjam"]:checked').val() == "Ya";} },
        terlibatProgram: { required: true },
        pernahPengurus: { required: true },
        kebiasaanPatologis: { required: true },
        sholatFardu: { required: true },
        kegiatanPengajian: { required: true },
        kegiatanPengajian: { required: true },
        kegiatanBerinfaq: { required: true },
    },
    messages: {},
    errorClass: "invalid-feedback",
    // errorElement: 'div',
    // validClass: "valid-tooltip",
    highlight: function (element, errorClass, validClass) {
        if ($(element).attr("type") == "radio") {
            $('input[name=' + $(element).attr("name") + ']').removeClass("is-valid").addClass("is-invalid");
        } else {
            $(element).removeClass('is-valid').addClass('is-invalid');
        }
    },
    unhighlight: function (element, errorClass, validClass) {
        if ($(element).attr("type") == "radio") {
            $('input[name=' + $(element).attr("name") + ']').removeClass('is-invalid').addClass('is-valid');
        } else {
            $(element).removeClass('is-invalid').addClass('is-valid');
        }
    },
});