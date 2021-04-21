<script type="text/javascript">
var appId = 0;
var dataId = 0;
$(document).ready(function() {
    $(".btnmodalForm").click(function(e) {
        e.preventDefault();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        appId = $(this).attr("app-id");
        $("#app_id_input").val(appId);
        $("#form").attr("action","<?=base_url()?>staff/kelolastaff/simpan");
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
                $.notify("Berhasil Hapus Data",'success');
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $.notify("Gagal Hapus Data, silahkan coba kembali","error");
                $('#modalHapus').modal('hide');
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
                $.notify(res.msg);
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalForm').modal('hide');
                notifyNO("Gagal Simpan Data, silahkan coba kembali");
            }
        })
    })
})


function hapus(id,appid){
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    appId = appid;
    $("#id_input_hapus").val(dataId);
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
    $("#form").attr("action","<?=base_url()?>staff/kelolastaff/ubah");
}

   var t =	$('#datatable').DataTable({
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
				url 		: "<?=base_url()?>staff/kelolastaff/datatableStaff",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nama'},
                {data: 'email'},
                {data: 'agama'},
                {data: 'jenis_kelamin'},
                {data: 'tempat_lahir'},
                {data: 'tanggal_lahir'},
                {data: 'alamat'},
                {data: 'no_hp'},
                {data: 'nik'},
                {data: 'jenjang_pendidikan'},
                {data: 'action', orderable:false, searchable:false},
			],


        });
</script>