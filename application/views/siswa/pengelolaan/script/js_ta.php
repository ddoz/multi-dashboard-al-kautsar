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