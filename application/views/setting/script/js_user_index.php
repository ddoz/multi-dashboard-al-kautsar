<script type="text/javascript">

var dataId = 0;
$(document).ready(function() {
    $(".btnmodalForm").click(function(e) {
        e.preventDefault();
        $('#form')[0].reset();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        $("#form").attr("action","<?=base_url()?>setting/kelolauser/simpan");
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
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalHapus').modal('hide');
                $.notify("Gagal Hapus Data, silahkan coba kembali");
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
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalForm').modal('hide');
                $.notify("Gagal Simpan Data, silahkan coba kembali");
            }
        })
    })
})


function hapus(id){
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    $("#id_input_hapus").val(dataId);
}

function edit(data) {
    appId = data.app_id;
    $("#modalForm").modal({ backdrop: 'static', keyboard: false });
    $("#nama_unit_input").val(data.nama_unit);
    $("#id_input").val(data.id);
    $("#form").attr("action","<?=base_url()?>setting/kelolauser/ubah");
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
            responsive: true,
            processing: true,
            serverSide 		: true,
			ajax:{
				url 		: "<?=base_url()?>setting/kelolauser/datatable",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nama'},
                {data: 'username'},
                {data: 'level'},
                {data: 'role'},
                {data: 'action', orderable:false, searchable:false},
			],


        });
</script>