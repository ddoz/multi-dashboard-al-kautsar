<script type="text/javascript">
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
				url 		: "<?=base_url()?>siswa/pengelolaansiswa/datatableSiswa/<?=$listApp->app_id?>",
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