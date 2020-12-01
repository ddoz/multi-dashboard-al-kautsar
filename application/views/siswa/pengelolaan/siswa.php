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
                                    <h2>Pengelolaan Siswa</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman pengelolaan data siswa</span></p>
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
                            <h2>Data Siswa <?=$listApp->app?></h2>
                            <p>Berikut merupakan data siswa keseluruhan.</p>
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

