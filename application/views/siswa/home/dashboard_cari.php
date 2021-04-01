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
                                    <i class="notika-icon notika-search"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Pencarian Data</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman hasil pencarian</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="<?=base_url()?>siswa/dashboard" data-toggle="tooltip" data-placement="left" title="Kembali" class="btn"><i class="notika-icon notika-left-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

<!-- Start Status area -->
    <div class="form-element-area">
        <div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Pencarian Umum</h2>
                            <p>Hasil Pencarian dari kata kunci <i><b><?=$this->input->get('key')?></b></i>.</p>
                        </div>
                        <div class="row">
                            <?php foreach($siswa as $key => $s) { 
                                    $image = base_url()."assets/img/user.svg";
                                    if($s->avatar!='') {
                                        $image = base_url()."uploads/".$s->avatar;
                                    }
                                ?>
                            <div class="col-md-2">
                                <div class="card" style="border: 1px solid gray;border-radius:10px;padding:10px">
                                    <img class="card-img-top" src="<?=$image?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-center" style="margin-top:10px"><?=$s->nama?></h5>
                                        <p>Kelas : <?=$s->nama_kelas?><br>Status Kelas : <?=($s->status_kelas)?'Aktif':'Tidak Aktif'?></p>
                                        <a href="<?=base_url()?>siswa/dashboard/detail/<?=$s->id?>" data-toggle="tooltip" data-placement="bottom" title="Detail Data Siswa" class="btn btn-info btn-block"><i class="notika-icon notika-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->

