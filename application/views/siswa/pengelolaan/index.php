<div class="container-fluid">
        <div class="fade-in">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                        <div class="c-callout c-callout-info">
                            <div class="text-value-lg">
                                <button class="btn btn-primary btn-xs btnTambahData"> Tambah Data</button>
                                <button class="btn btn-warning btn-xs btnmodalFormImport text-white"> Import Data</button>
                                <a class="btn btn-success btn-xs" href="<?=base_url()?>siswa/kelolasiswa/kenaikankelas"> Kenaikan Kelas</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($app as $listApp) { ?>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Siswa <?=$listApp->app?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <!-- <div class="c-callout c-callout-info">
                                <div class="text-value-lg">
                                <a href="<?=base_url()?>siswa/kelolasiswa/add/<?=$listApp->app_id?>" class="btn btn-primary btn-xs"> Tambah Data</a>
                                <button class="btn btn-warning btn-xs btnmodalFormImport" app-id="<?=$listApp->app_id?>"> Import Data</button>
                                <a class="btn btn-success btn-xs" href="<?=base_url()?>siswa/kelolasiswa/kenaikankelas/<?=$listApp->app_id?>"> Kenaikan Kelas</a>
                            </div>
                                </div> -->
                            </div>
                            <!-- /.col-->
                            <div class="col-12">
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
                                        <th>Tempat Tinggal Sekolah</th>
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
                            <!-- /.col-->
                            </div>
                            <!-- /.row-->
                        
                    </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>



    <div class="modal" id="modalForm" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Form Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form" action="<?=base_url()?>siswa/pengelolaankelas/simpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="app_id" id="app_id_input">
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="avatar">
                    </div>
                    <?=buildForm($form)?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                <form id="formImport" action="<?=base_url()?>siswa/kelolasiswa/simpanimport">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Sekolah</label>
                        <select name="app_id" id="app_id_import" required class="form-control">
                        <option value="">Pilih Sekolah</option>
                        <?php foreach($app as $listApp) { ?>
                        <option value="<?=$listApp->app_id?>"><?=$listApp->app?></option>
                        <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Akademik</label>
                        <select name="tahun_akademik_id" id="tahun_akademik_id" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                        </select>
                    </div>
                    <a href="<?=base_url()?>assets/Template_import_siswa.xlsx">Download Template</a>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file_import" id="file_import">
                        <textarea name="data" style="display:none" class="form-control" readonly id="data" cols="30" rows="10"></textarea>
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

    <div class="modal" id="modalTambahData" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="GET" action="<?=base_url()?>siswa/kelolasiswa/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Sekolah</label>
                        <select name="app_id" id="" class="form-control">
                        <?php foreach($app as $listApp) { ?>
                        <option value="<?=$listApp->app_id?>"><?=$listApp->app?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
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
                <form id="formHapus" action="<?=base_url()?>siswa/kelolasiswa/hapus">
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


    <div class="modal" id="modalFormUbahStatus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formUbahStatus" action="<?=base_url()?>siswa/kelolasiswa/ubahstatus">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_input_ubah_status">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" readonly="readonly" disabled="disabled" id="input_nama_siswa_ubah_status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status_sekolah" id="" required class="form-control">
                            <option value="aktif">Aktif</option>
                            <option value="alumni">Alumni</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" required class="form-control datepicker">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya Hapus Data</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>