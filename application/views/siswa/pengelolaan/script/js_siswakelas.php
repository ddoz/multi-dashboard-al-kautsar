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
</script>