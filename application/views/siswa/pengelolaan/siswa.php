
    
<?php foreach($app as $listApp) { ?>
    
    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-bottom:25px">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Data Siswa <?=$listApp->app?></h2>
                            <p>Berikut merupakan data siswa keseluruhan.</p>
                            <button class="btn btn-primary btn-xs btnmodalForm" app-id="<?=$listApp->app_id?>"><i class="fa fa-plus"></i> Tambah Data</button>
                            <button class="btn btn-warning btn-xs btnmodalFormImport" app-id="<?=$listApp->app_id?>"><i class="fa fa-upload"></i> Import Data</button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-<?=$listApp->app_id?>" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIK</th>
                                        <th>NO KK</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Dusun</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Kode POS</th>
                                        <th>Telepon</th>
                                        <th>No HP</th>
                                        <th>SKHUN</th>
                                        <th>Nama Ayah</th>
                                        <th>Pekerjaan Ayah</th>
                                        <th>Penghasilan Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Penghasilan Ibu</th>
                                        <th>Sekolah Asal</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Data Table area End-->
    <?php }?>

    <div class="modal" id="modalForm" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form" action="<?=base_url()?>siswa/pengelolaankelas/simpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2>Form Siswa</h2>
                    <input type="hidden" name="app_id" id="app_id_input">
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="avatar">
                    </div>
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

    <div class="modal" id="modalFormImport" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formImport" action="<?=base_url()?>siswa/pengelolaansiswa/simpanimport">
                <div class="modal-body">
                    <h2>Form Import Siswa</h2>
                    <input type="hidden" name="app_id" id="app_id_import_input">
                    <a href="<?=base_url()?>assets/Template_import_siswa.xlsx">Download Template</a>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file_import" id="file_import">
                        <textarea name="data" class="form-control" readonly id="data" cols="30" rows="10"></textarea>
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
                <form id="formHapus" action="<?=base_url()?>siswa/pengelolaansiswa/hapus">
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