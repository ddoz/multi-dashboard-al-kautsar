<script type="text/javascript">

var dataId = 0;
$(document).ready(function() {
    $(".btnmodalForm").click(function(e) {
        e.preventDefault();
        $('#form')[0].reset();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        $("#form").attr("action","<?=base_url()?>dma/kelolaperbaikan/simpan");
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
                $.notify("Gagal Hapus Data, silahkan coba kembali","error");
            }
        })
    })
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
                $('#modalForm').modal('hide');
                $.notify(res.msg,"success");
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalForm').modal('hide');
                $.notify("Gagal Simpan Data, silahkan coba kembali","error");
            }
        })
    })
});

$('#form_proses_perbaikan').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "<?=base_url()?>dma/kelolaperbaikan/proses_perbaikan",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            $.notify("Berhasil Simpan Data","success");
            setTimeout(function() {
                location.reload();
            },1000);
        },
        error: function(response) {
            $.notify("Gagal Simpan Data, silahkan coba kembali","error");
        }
    })
});

$('#btnSelesai').click(function(e) {
    e.preventDefault();
    $("#modalForm").modal();
    var id = $(this).attr("data-id");
    $("#id_input").val(id);
});

$('.btnTambahKeTable').click(function(e) {
    var idBarang = $("#idBarang").val();
    var barang = $("#idBarang").find(":selected").text();
    var jumlah = $("#jumlahPemakaian").val();
    if(idBarang != "" && jumlah != "") {
        var markup = "<tr><td><input type='checkbox' name='record'><input type='hidden' name='jumlah[]' value='"+jumlah+"'><input type='hidden' name='id_barang[]' value='"+idBarang+"'></td><td>" + barang + "</td><td>" + jumlah + "</td></tr>";
        $("#tableBarangPenyelesaian tbody").append(markup);
    }
});

$("#delete-row").click(function(){
    $("#tableBarangPenyelesaian tbody").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
            $(this).parents("tr").remove();
        }
    });
});

$("#formSelesai").submit(function(e) {
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
            $("#formSelesai")[0].reset();
            $('#modalForm').modal('hide');
            $.notify(res.msg,"success");
            setTimeout(() => {
                location.reload();
            }, 500);
        },
        error: function(error) {
            $('#modalForm').modal('hide');
            $.notify("Gagal Simpan Data, silahkan coba kembali","error");
        }
    })
});

function hapus(id){
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    $("#id_input_hapus").val(dataId);
}

function edit(data) {
    appId = data.app_id;
    $("#modalForm").modal({ backdrop: 'static', keyboard: false });
    $("#nama_layanan_input").val(data.nama_layanan);
    $("#id_input").val(data.id);
    $("#form").attr("action","<?=base_url()?>dma/kelolaperbaikan/ubah");
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
				url 		: "<?=base_url()?>dma/kelolaperbaikan/datatable",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nama'},
                {data: 'nama_layanan'},
                {data: 'nama_gedung'},
                {data: 'keterangan_laporan'},
                {data: 'created_at'},
                {data: 'start_at'},
                {data: 'done_at'},
                {data: 'action', orderable:false, searchable:false},
			],


        });
</script>