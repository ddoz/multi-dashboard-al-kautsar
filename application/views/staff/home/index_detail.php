<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>&nbsp;Detail Staff
                            <a href="<?=base_url()?>staff/homestaff" class="float-right" style="color:red"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                            </svg>&nbsp;</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-callout c-callout-info"><small class="text-muted">Detail Data Staff <i><b><?=$this->input->get("key")?></b></i></small>
                                    </div>
                                </div>
                                <div class="col-12">

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
                                    <div class="accordion" id="accordion" role="tablist">
                                        <!-- Data Diri -->
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h6 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Data Diri
													</a>
                                                </h6>
                                            </div>
                                            <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
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
                                        <div class="card mb-0">
                                            <div class="card-header" id="headingOne" role="tab">
                                                <h6 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
														Data Kepegawaian
													</a>
                                                </h6>
                                            </div>
                                            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <!-- RIWAYAT PENDIDIKAN -->
                                                    <div class="table-responsive">
                                                        <h6>Riwayat Pendidikan</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tingkat Pendidikan</th>
                                                                <th>Nama Sekolah/Universitas</th>
                                                                <th>Jurusan/Program Study</th>
                                                                <th>Tahun Masuk</th>
                                                                <th>Tahun Lulus</th>
                                                            </tr>
                                                            <?php foreach($riwayat_pendidikan as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->tingkat_pendidikan?></td>
                                                                <td><?=$rp->nama_sekolah?></td>
                                                                <td><?=$rp->jurusan?></td>
                                                                <td><?=$rp->tahun_masuk?></td>
                                                                <td><?=$rp->tahun_lulus?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- RIWAYAT PELATIHAN -->
                                                    <div class="table-responsive">
                                                        <h6>Riwayat Pelatihan</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Riwayat</th>
                                                                <th>Tempat</th>
                                                                <th>Penyelenggara</th>
                                                                <th>No STTP</th>
                                                                <th>Tanggal STTP</th>
                                                                <th>Tanggal Mulai</th>
                                                                <th>Tanggal Selesai</th>
                                                                <th>Jumlah Jam</th>
                                                            </tr>
                                                            <?php foreach($riwayat_pelatihan as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->nama_riwayat?></td>
                                                                <td><?=$rp->tempat?></td>
                                                                <td><?=$rp->penyelenggara?></td>
                                                                <td><?=$rp->no_sttp?></td>
                                                                <td><?=$rp->tanggal_sttp?></td>
                                                                <td><?=$rp->tanggal_mulai?></td>
                                                                <td><?=$rp->tanggal_selesai?></td>
                                                                <td><?=$rp->jumlah_jam?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- RIWAYAT JABATAN -->
                                                    <div class="table-responsive">
                                                        <h6>Riwayat Jabatan</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Jenis Jabatan</th>
                                                                <th>Nama Jabatan</th>
                                                                <th>Unit Kerja</th>
                                                                <th>Nomor SK</th>
                                                                <th>TMT</th>
                                                                <th>Tanggal SK</th>
                                                                <th>Pejabat Yang Mengesahkan</th>
                                                            </tr>
                                                            <?php foreach($riwayat_jabatan as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->jenis_jabatan?></td>
                                                                <td><?=$rp->nama_jabatan?></td>
                                                                <td><?=$rp->nama_unit?></td>
                                                                <td><?=$rp->nomor_sk?></td>
                                                                <td><?=$rp->tmt?></td>
                                                                <td><?=$rp->tanggal_sk?></td>
                                                                <td><?=$rp->pejabat_pengesah?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- RIWAYAT TUGAS TAMBAHAN -->
                                                    <div class="table-responsive">
                                                        <h6>Riwayat Tugas Tambahan</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Unit Kerja</th>
                                                                <th>Nama Tugas</th>
                                                                <th>Nomor SK</th>
                                                                <th>TMT</th>
                                                                <th>Tanggal SK</th>
                                                                <th>Pejabat Yang Mengesahkan</th>
                                                            </tr>
                                                            <?php foreach($riwayat_tugas as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->nama_unit?></td>
                                                                <td><?=$rp->nama_tugas?></td>
                                                                <td><?=$rp->nomor_sk?></td>
                                                                <td><?=$rp->tmt?></td>
                                                                <td><?=$rp->tanggal_sk?></td>
                                                                <td><?=$rp->pejabat_pengesah?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- RIWAYAT KEPANGKATAN -->
                                                    <div class="table-responsive">
                                                        <h6>Riwayat Kepangkatan</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Pangkat/Golongan</th>
                                                                <th>Regular/Pilihan</th>
                                                                <th>TMT Pangkat</th>
                                                                <th>Nomor SK</th>
                                                                <th>Tanggal SK</th>
                                                                <th>Pejabat Yang Mengesahkan</th>
                                                            </tr>
                                                            <?php foreach($riwayat_kepangkatan as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->pangkat_golongan?></td>
                                                                <td><?=$rp->regular_pilihan?></td>
                                                                <td><?=$rp->tmt_pangkat?></td>
                                                                <td><?=$rp->nomor_sk?></td>
                                                                <td><?=$rp->tanggal_sk?></td>
                                                                <td><?=$rp->pejabat_pengesah?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- DATA KELUARGA -->
                                                    <div class="table-responsive">
                                                        <h6>Data Keluarga</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Pasangan</th>
                                                                <th>Tempat Lahir</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Tunjangan</th>
                                                                <th>Tanggal Menikah</th>
                                                                <th>Pekerjaan</th>
                                                            </tr>
                                                            <?php foreach($keluarga as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->nama_pasangan?></td>
                                                                <td><?=$rp->tempat_lahir?></td>
                                                                <td><?=$rp->tanggal_lahir?></td>
                                                                <td><?=$rp->tunjangan?></td>
                                                                <td><?=$rp->tanggal_menikah?></td>
                                                                <td><?=$rp->pekerjaan?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- DATA ANAK -->
                                                    <div class="table-responsive">
                                                        <h6>Data Anak</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Anak</th>
                                                                <th>Tempat Lahir</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Status Anak</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Anak Ke</th>
                                                                <th>Pendidikan Terakhir</th>
                                                            </tr>
                                                            <?php foreach($anak as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->nama_anak?></td>
                                                                <td><?=$rp->tempat_lahir?></td>
                                                                <td><?=$rp->tanggal_lahir?></td>
                                                                <td><?=$rp->status_anak?></td>
                                                                <td><?=$rp->jenis_kelamin?></td>
                                                                <td><?=$rp->anak_ke?></td>
                                                                <td><?=$rp->pendidikan_terakhir?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- DATA ORANG TUA -->
                                                    <div class="table-responsive">
                                                        <h6>Data Orang Tua</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Tempat Lahir</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Alamat</th>
                                                                <th>Pendidikan Terakhir</th>
                                                            </tr>
                                                            <?php foreach($ortu as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->nama?></td>
                                                                <td><?=$rp->tempat_lahir?></td>
                                                                <td><?=$rp->tanggal_lahir?></td>
                                                                <td><?=$rp->jenis_kelamin?></td>
                                                                <td><?=$rp->alamat?></td>
                                                                <td><?=$rp->pendidikan_terakhir?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                    </div>

                                                    <!-- NILAI DP2T -->
                                                    <div class="table-responsive">
                                                        <h6>Nilai DP2T (Lima Tahun Terakhir)</h6>
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tahun</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                            <?php foreach($dpt as $key => $rp) { ?>
                                                            <tr>
                                                                <td><?=$key+1?></td>
                                                                <td><?=$rp->tahun?></td>
                                                                <td><?=$rp->nilai?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </table>
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