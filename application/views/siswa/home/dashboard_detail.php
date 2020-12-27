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
                                    <i class="notika-icon notika-checked"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Detail Data</h2>
                                    <p>Ok, <span class="bread-ntd">ini halaman detail siswa</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <a href="javascript:history.back();" data-toggle="tooltip" data-placement="left" title="Kembali" class="btn"><i class="notika-icon notika-left-arrow"></i></a>
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
                            <h2>Detail Siswa</h2>
                        </div>
                        <div class="row">
                            <?php 
                                    $image = base_url()."assets/img/user.svg";
                                    if($siswa->avatar!='') {
                                        $image = base_url()."uploads/".$siswa->avatar;
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
                                                            NISN
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nisn?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Nama Lengkap
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Jenis Kelamin
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->jenis_kelamin?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Tempat Tanggal Lahir
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->tempat_lahir?>/<?=$siswa->tanggal_lahir?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            NIK
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nik?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Nomor KK
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->no_kk?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Agama
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->agama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Alamat
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->alamat?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            RT/RW
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->rt?>/<?=$siswa->rw?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Dusun
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->dusun?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Kelurahan
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->kelurahan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Kecamatan
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->kecamatan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Kode POS
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->kode_pos?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Telpon
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->telepon?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            No HP
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->no_hp?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            SKHUN
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->skhun?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-two" aria-expanded="false">
															Data Orang Tua
														</a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Ayah
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ayah_nama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Pekerjaan Ayah
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ayah_pekerjaan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Penghasilan Ayah
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ayah_penghasilan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            No Hp Ayah
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ayah_hp?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Ibu
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ibu_nama?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Pekerjaan Ibu
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ibu_pekerjaan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Penghasilan Ibu
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ibu_penghasilan?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            No Hp Ibu
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->ibu_hp?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-four" aria-expanded="false">
                                                        Data Pendidikan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-four" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Sekolah Asal
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->sekolah_asal?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Kelas Saat ini
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nama_kelas?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-three" aria-expanded="false">
                                                        Data Keuangan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-three" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    <p>Belum Diketahui</p>
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

