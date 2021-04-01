<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                    </svg>&nbsp;Pencarian Data</div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                        <div class="col-12">
                            <div class="c-callout c-callout-info"><small class="text-muted">Anda dapat memasukkan NISN atau Nama</small>
                            <div class="text-value-lg">Pencarian Umum</div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-12">
                           <!-- Form -->
                            <form action="<?=base_url()?>siswa/homesiswa/cari" method="get">
                                <div class="form-group">
                                    <label for="">Masukkan Kata Kunci</label>
                                    <input type="text" name="key" placeholder="Masukkan Kata Kunci Pencarian" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block"><svg class="c-icon">
                                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                                    </svg>&nbsp;Cari</button>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                        <!-- /.col-->
                        </div>
                        <!-- /.row-->
                        
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6">
                        <div class="row">
                        <div class="col-12">
                        <div class="c-callout c-callout-danger"><small class="text-muted">Anda dapat memilih pilihan yang sudah di sediakan</small>
                            <div class="text-value-lg">Pencarian Lebih Spesifik</div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-12">
                            <!-- Form -->
                            <form action="<?=base_url()?>siswa/homesiswa/cari" method="get">
                                <div class="form-group">
                                    <label for="">Tahun Akademik</label>
                                    <select name="ta" class="form-control">
                                        <option value="">Pilih Tahun Akademik</option>
                                        <?php foreach($ta as $th) { foreach($th as $t) { ?>
                                        <option value="<?=$t->id?>"><?=$t->tahun_akademik?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select name="ta" class="form-control">
                                        <option value="">Pilih Tahun Akademik</option>
                                        <?php foreach($kelas as $th) { foreach($th as $t) { ?>
                                        <option value="<?=$t->id?>"><?=$t->nama_kelas?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block"><svg class="c-icon">
                                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                                    </svg>&nbsp;Cari</button>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                        <!-- /.col-->
                        </div>
                        <!-- /.row-->
                        
                    </div>
                    
                </div>
                </div>
            </div>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>