
<!-- Start Status area -->
    <div class="form-element-area">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Detail Staff</h2>
                        </div>
                        <div class="row">
                            <?php 
                                    $image = base_url()."assets/img/user.svg";
                                    if($staff->foto!='') {
                                        $image = base_url()."uploads/".$staff->foto;
                                    }
                                ?>
                            <div class="col-md-2">
                                <div class="card" style="border: 1px solid gray;border-radius:10px;padding:10px">
                                    <img class="card-img-top" src="<?=$image?>" alt="Card image cap">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <div class="accordion-stn sm-res-mg-t-30">
                                    <div class="panel-group" data-collapse-color="nk-red" id="accordionRed" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-one" aria-expanded="true">
															Data Diri
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Email
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->email?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Nama Lengkap
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->nama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Jenis Kelamin
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->jenis_kelamin?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Tempat Tanggal Lahir
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->tempat_lahir?>/<?=$staff->tanggal_lahir?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            NIK
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->nik?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Agama
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->agama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Alamat
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->alamat?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            No HP
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$staff->no_hp?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-four" aria-expanded="false">
                                                        Data Lainnya
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-four" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="<?=base_url()?>staff/laporan/detailpegawai/<?=$staff->id?>">Lihat Disini</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->

