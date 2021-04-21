
        <footer class="c-footer">
          <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
          <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
        </footer>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="<?=base_url()?>assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/data-table/data-table-act.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
     <!-- datapicker JS
		============================================ -->
    <script src="<?=base_url()?>assets/js/datapicker/bootstrap-datepicker.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="<?=template('default')?>vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="<?=template('default')?>vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <script src="<?=template('default')?>vendors/@coreui/utils/js/coreui-utils.js"></script><!-- XLSX -->
    <!-- chosen -->
    <script src="<?=base_url()?>assets/js/chosen/chosen.jquery.js"></script>
    <script src="<?=base_url()?>assets/js/xlsx.full.min.js"></script>
    <script src="<?=template('default')?>/js/notify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.datepicker').datepicker();
        $('.select2').select2();
      })
    </script>
    <?php 
    if(!empty($script)) {
        $this->load->view($script);
    }
    ?>
  </body>
</html>