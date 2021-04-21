<script type="text/javascript">

var appId = 0;
var dataId = 0;
$(document).ready(function() {
    $(".modalKelas").click(function(e) {
        e.preventDefault();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        appId = $(this).attr("app-id");
        $("#app_id_input").val(appId);
        $("#form").attr("action","<?=base_url()?>siswa/kelolakelas/simpan");
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
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalHapus').modal('hide');
                notifyNO("Gagal Hapus Data, silahkan coba kembali");
            }
        })
    })
    $("#form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#form").attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#form")[0].reset();
                $('#modalForm').modal('hide');
                $.notify("Berhasil Simpan Data","success");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalForm').modal('hide');
                $.notify("Gagal Simpan Data, silahkan coba kembali","error");
            }
        })
    })
})


function hapus(id,appid){
    console.log(id);
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    appId = appid;
    $("#id_input_hapus").val(dataId);
}

function edit(data) {
    appId = data.app_id;
    $("#modalForm").modal({ backdrop: 'static', keyboard: false });
    $("#app_id_input").val(appId);
    $("#nama_kelas_input").val(data.nama_kelas);
    $("#id_input").val(data.id);
    $("#form").attr("action","<?=base_url()?>siswa/kelolakelas/ubah");
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
            responsive: true,
            processing: true,
            serverSide 		: true,
			ajax:{
				url 		: "<?=base_url()?>siswa/kelolakelas/datatableKelas/<?=$listApp->app_id?>",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nama_kelas'},
                {data: 'action', orderable:false, searchable:false},
			],


        });

        <?php }?>
</script>