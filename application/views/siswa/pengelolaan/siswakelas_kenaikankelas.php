<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-settings"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Kenaikan Kelas</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman pengelolaan kenaikan kelas</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?=base_url()?>siswa/pengelolaansiswakelas" data-toggle="tooltip" data-placement="left" title="Kembali" class="btn"><i class="notika-icon notika-left-arrow"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
    
    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-bottom:25px">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Form Kenaikan Kelas </h2>
                        </div>

                        <?=showStatusMessage()?>

                        <!-- mulai pilih kelas -->
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
                </div>
            </div>

        </div>
    </div>
    <!-- Data Table area End-->

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
