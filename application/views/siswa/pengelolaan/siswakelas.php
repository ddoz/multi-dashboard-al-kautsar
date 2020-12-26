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
                                    <h2>Pengelolaan Siswa Kelas</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman pengelolaan data siswa kelas</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?=base_url()?>siswa/pengelolaansiswakelas/kenaikankelas" data-toggle="tooltip" data-placement="left" title="Kenaikan Kelas" class="btn"><i class="notika-icon notika-sent"></i> Kenaikan Kelas</a>
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
                            <h2>Data Siswa Kelas <?=$listApp->app?></h2>
                            <p>Berikut merupakan data siswa kelas keseluruhan.</p>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-<?=$listApp->app_id?>" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
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

