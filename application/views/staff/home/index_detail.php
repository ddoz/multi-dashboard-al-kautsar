<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>&nbsp;Detail Siswa
                            <a href="<?=base_url()?>siswa/homesiswa" class="float-right" style="color:red"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                            </svg>&nbsp;</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-callout c-callout-info"><small class="text-muted">Detail Data Siswa <i><b><?=$this->input->get("key")?></b></i></small>
                                    </div>
                                </div>
                                <div class="col-12">

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
                                    <div class="accordion" id="accordion" role="tablist">
                                        <!-- Data Diri -->
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Data Diri
													</a>
                                                </h5>
                                            </div>
                                            <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
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
                                        <!-- Data Orang Tua -->
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
														Data Orang Tua
													</a>
                                                </h5>
                                            </div>
                                            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
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
                                        <!-- Data Pendidikan -->
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
														Data Pendidikan
													</a>
                                                </h5>
                                            </div>
                                            <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
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
                                                            NIS
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nis?>
                                                        </div>
                                                    </div>

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
                                                            Tahun Masuk
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->tahun_masuk?>
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

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            Riwayat Kelas 
                                                            <ul>
                                                            <?php foreach(getRiwayat($siswa->id)->result() as $riwayatpdk) { ?>
                                                                <li><?=$riwayatpdk->nama_kelas?></li>
                                                            <?php }?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Data Keuangan -->
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
														Data Keuangan
													</a>
                                                </h5>
                                            </div>
                                            <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            Nomor VA
                                                        </div>
                                                        <div class="col-md-10">
                                                            : <?=$siswa->nomor_va?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            Riwayat Keuangan
                                                            <ul>
                                                            <?php foreach(getRiwayat($siswa->id)->result() as $riwayatpdk) { ?>
                                                                <li><?=$riwayatpdk->nama_kelas?></li>
                                                            <?php }?>
                                                            </ul>
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
            </div>
        </div>
</div>