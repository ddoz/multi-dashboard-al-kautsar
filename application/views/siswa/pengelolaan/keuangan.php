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
                                    <h2>Pengelolaan Keuangan</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman pengelolaan data keuangan</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
    
    
<?php foreach($app as $listApp) { ?>
    
    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-bottom:25px">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2> Keuangan <?=$listApp->app?></h2>
                            <p>Berikut merupakan data keseluruhan.</p>
                            <button type="button" class="btn btn-primary btn-xs modalTa" app-id="<?=$listApp->app_id?>"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatablekeuangan-<?=$listApp->app_id?>" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tahun Akademik</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
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




    <div class="modal" id="modalFormTa" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTa" action="<?=base_url()?>siswa/pengelolaankeuangan/simpan">
                <div class="modal-body">
                    <h2>Form Pembayaran</h2>
                    <input type="hidden" name="app_id" id="app_id_input">
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label for="">Jenis Pembayaran</label>
                        <select name="keuangan_id" required class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach($keuangan as $k) { ?>
                                <option value="<?=$k->id?>"><?=$k->jenis_keuangan?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Akademik</label>
                        <select name="tahun_akademik_id" id="tahun_akademik_id" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php foreach($ta as $li) { foreach($li as $l) { ?>
                            <option value="<?=$l->id?>"><?=$l->tahun_akademik?> - <?=$l->app?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Siswa</label>
                        <select name="siswa_id" id="siswa_id" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php foreach($siswa as $ss) { foreach($ss as $s){ ?>
                            <option value="<?=$s->id?>"><?=$s->nama?> | <?=$s->nama_kelas?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Bayar</label>
                        <input type="text" name="jumlah_bayar" class="form-control">
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