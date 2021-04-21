<div class="container-fluid">
        <div class="fade-in">
        <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg"><?=$total?></div>
                        <div>Jumlah Staff</div>
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
                            <div class="c-callout c-callout-info"><small class="text-muted">Anda dapat memasukkan Nama</small>
                            <div class="text-value-lg">Pencarian Umum</div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-12">
                           <!-- Form -->
                            <form action="<?=base_url()?>staff/homestaff/cari" method="get">
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
                    
                </div>
                </div>
            </div>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>