<script type="text/javascript">
var appId = 0;
var dataId = 0;
$(document).ready(function() {
    $(".btnmodalForm").click(function(e) {
        e.preventDefault();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        appId = $(this).attr("app-id");
        $("#app_id_input").val(appId);
        $("#form").attr("action","<?=base_url()?>siswa/kelolasiswa/simpan");
    });
    $(".btnmodalFormImport").click(function(e) {
        e.preventDefault();
        $("#formImport")[0].reset();
        document.getElementById("data").innerHTML = "";
        $("#modalFormImport").modal({ backdrop: 'static', keyboard: false });
        appId = $(this).attr("app-id");
        $("#app_id_import_input").val(appId);
    });
    $("#formHapus").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#formHapus").attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#formHapus")[0].reset();
                $('#modalHapus').modal('hide');
                $.notify("Berhasil Hapus Data","success");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalHapus').modal('hide');
                $.notify("Gagal Hapus Data, silahkan coba kembali","error");
            }
        })
    });
    $("#formImport").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#formImport").attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#formImport")[0].reset();
                $('#modalFormImport').modal('hide');
                $.notify("Berhasil Import Data","success");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalFormImport').modal('hide');
                $.notify("Gagal Import Data, silahkan coba kembali","error");
            }
        })
    });
    $("#form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                $("#form")[0].reset();
                document.getElementById("data").innerHTML = "";
                $('#modalForm').modal('hide');
                $.notify(res.msg,"success");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalForm').modal('hide');
                $.notify("Gagal Simpan Data, silahkan coba kembali", "error");
            }
        })
    })
    $("#form2").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(response) {
                $.notify(res.msg,"success");
            },
            error: function(error) {
                $.notify("Gagal Simpan Data, silahkan coba kembali", "error");
            }
        })
    })
    $("#formUbahStatus").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                $("#formUbahStatus")[0].reset();
                $('#modalFormUbahStatus').modal('hide');
                if(res.msg=="no") {
                    $.notify("Gagal Ubah Data, silahkan coba kembali","error");
                }else {
                    $.notify("Berhasil ubah Data","success");
                }
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalFormUbahStatus').modal('hide');
                $.notify("Gagal Ubah Data, silahkan coba kembali","error");
            }
        })
    })
})

$('#file_import').change(function(evt) {
    document.getElementById("data").innerHTML = "";
    var selectedFile = evt.target.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        var data = event.target.result;
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        workbook.SheetNames.forEach(function(sheetName) {
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets["Data Import Siswa"]);
            var json_object = JSON.stringify(XL_row_object);
            document.getElementById("data").innerHTML = json_object;
        });
    };

    reader.onerror =  function(event) {
        alert("File could not be read. Code "+ event.target.error.code);
    };

    reader.readAsBinaryString(selectedFile);
});

function hapus(id,appid){
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    appId = appid;
    $("#id_input_hapus").val(dataId);
}

function ubahstatus(data) {
    $("#modalFormUbahStatus").modal({ backdrop: 'static', keyboard: false });
    dataId = data.id;
    appId = data.app_id;
    $("#id_input_ubah_status").val(dataId);
    $("#input_nama_siswa_ubah_status").val(data.nama);
}

function edit(data) {
    appId = data.app_id;
    $("#modalForm").modal({ backdrop: 'static', keyboard: false });
    $("#app_id_input").val(appId);
    $("#nama_input").val(data.nama);
    $("#jenis_kelamin_input option[value='"+data.jenis_kelamin+"'").attr('selected','selected');
    $("#nisn_input").val(data.nisn);
    $("#tempat_lahir_input").val(data.tempat_lahir);
    $("#tanggal_lahir_input").val(data.tanggal_lahir);
    $("#nik_input").val(data.nik);
    $("#no_kk_input").val(data.no_kk);
    $("#agama_input option[value='"+data.agama+"'").attr('selected','selected');
    $("#alamat_input").html(data.alamat);
    $("#rt_input").val(data.rt);
    $("#rw_input").val(data.rw);
    $("#dusun_input").val(data.dusun);
    $("#kelurahan_input").val(data.kelurahan);
    $("#kecamatan_input").val(data.kecamatan);
    $("#kode_pos_input").val(data.kode_pos);
    $("#telepon_input").val(data.telepon);
    $("#no_hp_input").val(data.no_hp);
    $("#skhun_input").val(data.skhun);
    $("#ayah_nama_input").val(data.ayah_nama);
    $("#ayah_pekerjaan_input").val(data.ayah_pekerjaan);
    $("#ayah_penghasilan_input").val(data.ayah_penghasilan);
    $("#ayah_hp_input").val(data.ayah_hp);
    $("#ibu_nama_input").val(data.ibu_nama);
    $("#ibu_pekerjaan_input").val(data.ibu_pekerjaan);
    $("#ibu_penghasilan_input").val(data.ibu_penghasilan);
    $("#ibu_hp_input").val(data.ibu_hp);
    $("#sekolah_asal_input").val(data.sekolah_asal);
    $("#id_input").val(data.id);
    $("#form").attr("action","<?=base_url()?>siswa/kelolasiswa/ubah");
}

<?php foreach($app as $listApp) { ?>
   var t =	$('#datatable-<?=$listApp->app_id?>').DataTable({
        initComplete: function() {
              var api = this.api();
              $('#datatable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
            // responsive: true,
            processing: true,
            serverSide 		: true,
			ajax:{
				url 		: "<?=base_url()?>siswa/kelolasiswa/datatableSiswa/<?=$listApp->app_id?>",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nisn'},
                {data: 'nama'},
                {data: 'jenis_kelamin'},
                {data: 'tempat_lahir'},
                {data: 'tanggal_lahir'},
                {data: 'nik'},
                {data: 'no_kk'},
                {data: 'agama'},
                {data: 'alamat'},
                {data: 'rt'},
                {data: 'rw'},
                {data: 'dusun'},
                {data: 'kelurahan'},
                {data: 'kecamatan'},
                {data: 'kode_pos'},
                {data: 'telepon'},
                {data: 'no_hp'},
                {data: 'skhun'},
                {data: 'ayah_nama'},
                {data: 'ayah_pekerjaan'},
                {data: 'ayah_penghasilan'},
                {data: 'ibu_nama'},
                {data: 'ibu_pekerjaan'},
                {data: 'ibu_penghasilan'},
                {data: 'sekolah_asal'},
                {data: 'status'},
                {data: 'action', orderable:false, searchable:false},
			],


        });

        <?php }?>
</script>