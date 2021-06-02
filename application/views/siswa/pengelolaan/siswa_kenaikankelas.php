<div class="container-fluid">
        <div class="fade-in">
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Kenaikan Kelas
                    <div class="float-right">
                    <a href="<?=base_url()?>siswa/kelolasiswa">   
                    <svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                    </svg></a> </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <div class="c-callout c-callout-info">
                                    <div class="text-value-lg">
                                        Form Kenaikan Kelas
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-12">
                                <!-- mulai pilih kelas -->
                                <?=showStatusMessage()?>

                                <div id="pilihkelas">
                                    <h4 class="text text-success">Pemilihan Kelas</h4>
                                    <form id="formpilihkelas">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Pilih Jenjang Sekolah</label>
                                                <select class="form-control" name="app_id" id="app_id" required>
                                                <option value="">Pilih Data</option>
                                                <?php foreach($app as $listApp) { ?>
                                                    <option value="<?=$listApp->app_id?>"><?=$listApp->app?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Pilih Tahun Akademik</label>
                                                <select class="form-control" id="tahun_akademik" name="tahun_akademik" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Pilih Kelas</label>
                                                <select class="form-control" id="kelas" name="kelas" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="btn btn-info">Selanjutnya <i class="notika-icon notika-right-arrow"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end pilih kelas -->

                                <!-- mulai konfirmasi siswa -->
                                <div id="konfirmasisiswa">
                                    <h4 class="text text-success">Konfirmasi Siswa</h4>
                                    <div id="tablesiswa"></div>
                                </div>
                                <!-- end konfirmasi siswa -->
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


        <div class="modal" id="modalHapus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>siswa/pengelolaansiswakelas/hapus">
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

    <div class="modal" id="modalUbahStatus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>siswa/pengelolaansiswakelas/aktifkelas">
                <div class="modal-body">
                    <h2>Aktifkan data ini?</h2>
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
