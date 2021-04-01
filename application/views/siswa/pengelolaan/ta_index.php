<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <?php foreach($app as $listApp) { ?>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Tahun Akademik <?=$listApp->app?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <div class="c-callout c-callout-info">
                                <div class="text-value-lg"><button type="button" class="btn btn-primary btn-xs modalTa" app-id="<?=$listApp->app_id?>"><i class="fa fa-plus"></i> Tambah Data</button></div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="datatable-<?=$listApp->app_id?>" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tahun Akademik</th>
                                                <th>Status</th>
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
        <?php }?>
            </div>
            <!-- /.row-->
        </div>
        </div>


        <div class="modal" id="modalFormTa" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTa" action="<?=base_url()?>siswa/pengelolaanta/simpan">
                <div class="modal-body">
                    <h2>Form Tahun Akademik</h2>
                    <input type="hidden" name="app_id" id="app_id_input">
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label for="">Nama Tahun Akademik</label>
                        <input type="text" name="tahun_akademik" id="tahun_akademik_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="status_input" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                <form id="formHapus" action="<?=base_url()?>siswa/pengelolaanta/hapus">
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