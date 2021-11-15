
<h3>LAPORAN PERBAIKAN SARANA DIVISI MAINTENANCE YAYASAN AL KAUTSAR BANDAR LAMPUNG BULAN AGUSTUS 2021</h3>
<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="datatable_laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No. Tanda Terima</th>
                <th>Nama Pelapor</th>
                <th>Unit</th>
                <th>Lokasi</th>
                <th>Jenis Perbaikan</th>
                <th>Proses</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Tenaga Kerja</td>
                <td></td>
                <td>Mulai</td>
                <td></td>
                <td>Selesai</td>
                <td></td>
                <td>Status</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>Tanggal</td>
                <td>Jam</td>
                <td>Tanggal</td>
                <td>Jam</td>
                <td>Ok/Fail</td>
            </tr>
            <?php foreach($tabel as $key => $rp) { ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=date('d-m-Y',strtotime($rp->created_at))?></td>
                    <td>DMA<?=$rp->id?></td>
                    <td><?=$rp->nama?></td>
                    <td></td>
                    <td><?=$rp->nama_gedung."/".$rp->nama_ruangan?></td>
                    <td><?=$rp->keterangan_proses?></td>
                    <td><?=getTeknisi($rp->id_perbaikan,'1')?></td>
                    <td><?=getTeknisi($rp->id_perbaikan,'2')?></td>
                    <td><?=date('d-m-Y',strtotime($rp->start_at))?></td>
                    <td><?=date('H:i:s',strtotime($rp->start_at))?></td>
                    <td><?=date('d-m-Y',strtotime($rp->done_at))?></td>
                    <td><?=date('H:i:s',strtotime($rp->done_at))?></td>
                    <td><?=$rp->keterangan_hasil?></td>
                </tr>
            <?php }?>
        </tbody>
        
    </table>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function(){
        $('#datatable_laporan').DataTable( {
            "searching" : false,
            "paging":   false,
            "ordering": false,
            "info":     false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel'
            ]
        } );
    })
</script>
    