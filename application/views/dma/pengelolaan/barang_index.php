<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Barang</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <div class="c-callout c-callout-info">
                                <div class="text-value-lg">
                                <?php if(isSuper()) { ?>
                                <button class="btn btn-primary btn-xs btnmodalForm" > Tambah Data</button>
                                <?php }?>
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
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Barang Masuk (Transaksi Terakhir)</th>
                                        <th>Barang Keluar (Transaksi Terakhir)</th>
                                        <th>Stok Barang</th>
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
                    <h2>Form Barang</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form" action="<?=base_url()?>barang/kelolabarang/simpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_input">
                    <?=buildForm($form)?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table area End-->
<div class="modal" id="modalTransaksi" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Form Update Stok Barang</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTransaksi" action="<?=base_url()?>dma/kelolabarang/updatestok" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_input_transaksi">
                    <div class="form-group">
                        <label for="">Jumlah Stok Masuk</label>
                        <input type="number" name="jumlah_masuk" required class="form-control">
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
                    <h2>Form Hapus Barang</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>dma/kelolabarang/hapus">
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