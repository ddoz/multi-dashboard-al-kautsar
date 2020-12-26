<script type="text/javascript">
$(document).ready(function(e) {
    $('#konfirmasisiswa').hide();
});
function backToPilihKelas() {
    $('#pilihkelas').show();
    $('#konfirmasisiswa').hide();
}
function toggle(source) {
    alert('aaaa');
    $('input[type="checkbox"]' ).prop('checked', this.checked)
}
$('#formpilihkelas').submit(function(e) {
    e.preventDefault();
    $('#pilihkelas').hide();
    $('#konfirmasisiswa').show();
    $("#tablesiswa").empty();
    $.ajax({
        type:"POST",
        url:"<?=base_url()?>siswa/pengelolaansiswakelas/kenaikankelas_konfirmasisiswa",
        data: $(this).serialize(),
        success: function(response) {
            $("#tablesiswa").append(response);
        },
        error: function(e) {
            alert('Terjadi kesalahan, silahkan ulangi kembali');
            // location.reload();
        }
    })
})

$("#app_id").change(function(e) {
    e.preventDefault();
    var id = $(this).val();
    if(id!='') {
        $('#tahun_akademik').empty();
        $.ajax({
            url: '<?=base_url()?>siswa/pengelolaanta/optiondata',
            type: 'post',
            data: {id:id},
            success: function(response) {
                $('#tahun_akademik').append("<option value=''>Pilih Data</option>");
                if(response!=null) {
                    var resp = JSON.parse(response);
                    resp.forEach(function(val,index) {
                        $('#tahun_akademik').append("<option value='"+val.id+"'>"+val.tahun_akademik+"</option>");
                    })
                }
            },
            error: function(e) {
                alert('Terjadi kesalahan, silahkan coba kembali');
                location.reload();
            }
        })

    }
});

$('#tahun_akademik').change(function(e) {
    e.preventDefault();
    var id = $(this).val();
    if(id!='') {
        $('#kelas').empty();
        $.ajax({
            url: '<?=base_url()?>siswa/pengelolaankelas/optiondata',
            type: 'post',
            data: {id:id},
            success: function(response) {
                $('#kelas').append("<option value=''>Pilih Data</option>");
                if(response!=null) {
                    var resp = JSON.parse(response);
                    resp.forEach(function(val,index) {
                        $('#kelas').append("<option value='"+val.id+"'>"+val.nama_kelas+"</option>");
                    })
                }
            },
            error: function(e) {
                alert('Terjadi kesalahan, silahkan coba kembali');
                location.reload();
            }
        })

    }
});

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
				url 		: "<?=base_url()?>siswa/pengelolaansiswakelas/datatableSiswaKelas/<?=$listApp->app_id?>",
				type 		: "POST"
			},
			columns 		:[
                {data: 'nisn'},
                {data: 'nama'},
                {data: 'nama_kelas'},
                {data: 'status'},
                {data: 'action', orderable:false, searchable:false},
			],


        });

        <?php }?>
    
    function hapus(id,appid){
        $("#modalHapus").modal({ backdrop: 'static', keyboard: false });
        dataId = id;
        appId = appid;
        $("#id_input_hapus").val(dataId);
    }
</script>