<script type="text/javascript">

var dataId = 0;
$(document).ready(function() {
    $(".btnmodalForm").click(function(e) {
        e.preventDefault();
        $('#form')[0].reset();
        $("#modalForm").modal({ backdrop: 'static', keyboard: false });
        $("#form").attr("action","<?=base_url()?>dma/kelolabarang/simpan");
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
    $("#formTransaksi").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#formTransaksi").attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#formTransaksi")[0].reset();
                $('#modalTransaksi').modal('hide');
                $.notify("Berhasil Update Stok Data","success");
                $('#datatable').DataTable().ajax.reload(null, false);
            },
            error: function(error) {
                $('#modalTransaksi').modal('hide');
                $.notify("Gagal Update Stok Data, silahkan coba kembali","error");
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
                $.notify("Gagal Simpan Data, silahkan coba kembali","error");
            }
        })
    })
})


function hapus(id){
    $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    $("#id_input_hapus").val(dataId);
}

function transaksimasuk(id){
    $("#modalTransaksi").modal({ backdrop: 'static', keyboard: false });
    dataId = id;
    $("#id_input_transaksi").val(dataId);
}

function edit(data) {
    appId = data.app_id;
    $("#modalForm").modal({ backdrop: 'static', keyboard: false });
    $("#nama_barang_input").val(data.nama_barang);
    $("#merk_barang_input").val(data.merk_barang);
    $("#nomor_barang_input").val(data.nomor_barang);
    $("#stok_barang_input").val(data.stok_barang);
    $("#satuan_input").val(data.satuan);
    $("#id_input").val(data.id);
    $("#form").attr("action","<?=base_url()?>dma/kelolabarang/ubah");
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
				url 		: "<?=base_url()?>dma/kelolabarang/datatableBarang",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nomor_barang'},
                {data: 'nama_barang'},
                {data: 'merk_barang'},
                {data: 'satuan'},
                {data: 'barang_masuk'},
                {data: 'barang_keluar'},
                {data: 'stok_barang'},
                {data: 'action', orderable:false, searchable:false},
			],


        });
</script>