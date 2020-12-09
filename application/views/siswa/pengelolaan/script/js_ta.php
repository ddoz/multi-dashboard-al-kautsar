<script type="text/javascript">

var appId = 0;
$(document).ready(function() {
    $(".modalTa").click(function(e) {
        e.preventDefault();
        $("#modalFormTa").modal({ backdrop: 'static', keyboard: false });
        appId = $(this).attr("app-id");
        $("#app_id_input").val(appId);
        $("#formTa").attr("action","<?=base_url()?>siswa/pengelolaanta/simpan");
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
                notifyOK("Berhasil Hapus Data");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalHapus').modal('hide');
                notifyNO("Gagal Hapus Data, silahkan coba kembali");
            }
        })
    })
    $("#formTa").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#formTa").attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#formTa")[0].reset();
                $('#modalFormTa').modal('hide');
                notifyOK("Berhasil Simpan Data");
                $('#datatable-'+appId).DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalFormTa').modal('hide');
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
    $("#modalFormTa").modal({ backdrop: 'static', keyboard: false });
    $("#app_id_input").val(appId);
    $("#tahun_akademik_input").val(data.tahun_akademik);
    $("#id_input").val(data.id);
    $("#status_input option[value='"+data.status+"'").attr('selected','selected');
    $("#formTa").attr("action","<?=base_url()?>siswa/pengelolaanta/ubah");
}

<?php foreach($app as $listApp) { ?>
   var t =	$('#datatable-<?=$listApp->app_id?>').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
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
				url 		: "<?=base_url()?>siswa/pengelolaanta/datatableTa/<?=$listApp->app_id?>",
				type 		: "POST"
			},
			columns 		:[
                {data: 'tahun_akademik'},
                {data: 'status'},
                {data: 'action', orderable:false, searchable:false},
			],


        });

        <?php }?>
</script>