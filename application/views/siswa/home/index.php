<div class="container-fluid">
        <div class="fade-in">
        <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg"><?=$total?></div>
                        <div>Jumlah Siswa</div>
                    </div>
                        <div class="btn-group">
                            <i class="fa fa-users"></i>
                        </div>
                      
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;">
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg"><?=$aktif?></div>
                        <div>Jumlah Siswa Aktif</div>
                      </div>
                      <div class="btn-group">
                        <i class="fa fa-check"></i>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;">
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg"><?=$alumni?></div>
                        <div>Jumlah Alumni</div>
                      </div>
                      <div class="btn-group">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:10px;">
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg"><?=$mundur?></div>
                        <div>Jumlah Siswa Mengundurkan Diri</div>
                      </div>
                      <div class="btn-group">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:10px;">
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>

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