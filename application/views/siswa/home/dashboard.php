
<!-- Start Status area -->
    <div class="form-element-area">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Pencarian Umum</h2>
                            <p>Anda dapat memasukkan NISN atau Nama.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <form method="get" action="<?=base_url()?>siswa/dashboard/cari">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="key">
                                    <button type="submit" class="btn btn-warning btn-sm">Cari</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->

    <!-- Start Status area -->
    <div class="form-element-area" style="margin-top:10px">
        <div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Pencarian Lebih Spesifik</h2>
                            <p>Anda dapat memilih pilihan yang sudah di sediakan.</p>
                        </div>
                        <form method="get" action="<?=base_url()?>siswa/dashboard/carispesifik">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h2>Tahun Akademik</h2>
                                </div>
                                <div class="form-group">
                                    <select name="ta" required class="chosen" data-placeholder="Pilih data">
                                        <option value="">Pilih</option>
                                        <?php foreach($ta as $li) { foreach($li as $l) { ?>
                                        <option value="<?=$l->id?>"><?=$l->tahun_akademik?> - <?=$l->app?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Kelas</h2>
                                </div>
                                <div class="form-group">
                                    <select name="kelas" required class="chosen" data-placeholder="Pilih data">
                                        <option value="">Pilih</option>
                                        <?php foreach($kelas as $li) { foreach($li as $l) { ?>
                                        <option value="<?=$l->id?>"><?=$l->nama_kelas?> - <?=$l->app?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Jenis Siswa</h2>
                                </div>
                                <div class="form-group">
                                <select name="jenis" required class="chosen" data-placeholder="Pilih data">
                                        <option value="">Pilih</option>
                                        <?php foreach($app as $li) {  ?>
                                        <option value="<?=$li->id?>"><?=$li->app?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    
                                </div>
                                <div class="nk-int-mk">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->