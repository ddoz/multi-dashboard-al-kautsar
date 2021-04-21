<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Layanan</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <div class="c-callout c-callout-info">
                                <div class="text-value-lg">
                                <button class="btn btn-primary btn-xs btnmodalForm" > Tambah Data</button>
                                <!-- <button class="btn btn-warning btn-xs btnmodalFormImport" > Import Data</button> -->
                            </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-12">
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Pelapor</th>
                                        <th>Layanan</th>
                                        <th>Gedung</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Lapor</th>
                                        <th>Dikerjakan Pada Tanggal</th>
                                        <th>Selesai Pada Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                            </div>
                            </div>
                            <!-- /.col-->
                            </div>
                            <!-- /.row-->
                        
                    </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
        
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>
    <!-- Data Table area End-->
    <div class="modal" id="modalForm" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form" action="<?=base_url()?>dma/kelolaperbaikan/simpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2>Form Pelaporan</h2>
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label>Pilih Lokasi</label>
                        <select class="form-control" name="id_gedung" required>
                            <option value="">Pilih</option>
                            <?php foreach($gedung as $g) { ?>
                            <option value="<?=$g->id?>"><?=$g->nama_gedung?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Layanan</label>
                        <select class="form-control" name="id_layanan" required>
                            <option value="">Pilih</option>
                            <?php foreach($layanan as $g) { ?>
                            <option value="<?=$g->id?>"><?=$g->nama_layanan?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan_laporan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar_laporan" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modalHapus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>dma/kelolaperbaikan/hapus">
                <div class="modal-body">
                    <h2>Hapus data ini?</h2>
                    <input type="hidden" name="id" id="id_input_hapus">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya Hapus Data</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>