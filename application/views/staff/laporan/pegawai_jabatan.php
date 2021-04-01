
    
    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-bottom:25px">
         <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Detail Staff</h2>
                            <p>Berikut merupakan detail staff.</p>
                        </div>
                        
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">IDENTITAS DIRI</a></li>
                            <li><a data-toggle="tab" href="#menu1">RIWAYAT PENDIDIKAN</a></li>
                            <li><a data-toggle="tab" href="#menu2">RIWAYAT PELATIHAN/SEMINAR/WORKSHOP/BIMTEK/DLL</a></li>
                            <li><a data-toggle="tab" href="#menu3">RIWAYAT JABATAN</a></li>
                            <li><a data-toggle="tab" href="#menu4">RIWAYAT TUGAS TAMBAHAN</a></li>
                            <li><a data-toggle="tab" href="#menu5">RIWAYAT KEPANGKATAN</a></li>
                            <li><a data-toggle="tab" href="#menu6">DATA KELUARGA</a></li>
                            <li><a data-toggle="tab" href="#menu7">DATA ANAK</a></li>
                            <li><a data-toggle="tab" href="#menu8">DATA ORANG TUA</a></li>
                            <li><a data-toggle="tab" href="#menu9">NILAI DP2T (LIMA TAHUN TERAKHIR)</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- IDENTITAS DIRI -->
                        <div id="home" class="tab-pane fade in active">
                            <br>
                            <h4>IDENTITAS DIRI</h4>
                            <div class="table-responsive">
                                    <?php 
                                        $image = base_url()."assets/img/user.svg";
                                        if($staff->foto!='') {
                                            $image = base_url()."uploads/".$staff->foto;
                                        }
                                    ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto</th>
                                    <th>
                                        <div class="card">
                                            <img class="card-img-top" width="100" src="<?=$image?>" alt="Card image cap">
                                            <div class="card-body">
                                                <br>
                                               
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>
                                        <input readonly type="text" value="<?=$staff->nama?>" name="nama" class="form-control" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Gelar Depan</th>
                                    <th>
                                        <input readonly type="text" value="<?=$staff->gelar_depan?>" name="gelar_depan" required class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Gelar Belakang</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->gelar_depan?>" name="gelar_depan" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->nik?>" name="nik" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>NYP/NIP</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->nip_npy?>" name="nip_npy" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->agama?>" name="agama" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>
                                    <select readonly name="jenis_kelamin" required id="" class="form-control">
                                        <option <?=($staff->jenis_kelamin=="L")?"selected":""?> value="L">Laki-Laki</option>
                                        <option <?=($staff->jenis_kelamin=="P")?"selected":""?> value="P">Perempuan</option>
                                    </select>    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->email?>" name="email" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->alamat?>" name="alamat" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->tempat_lahir?>" name="tempat_lahir" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->tanggal_lahir?>" name="tanggal_lahir" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->no_hp?>" name="no_hp" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Jenjang Pendidikan</th>
                                    <th>
                                    <select readonly name="jenis_kelamin" required id="" class="form-control">
                                        <option <?=($staff->jenis_kelamin=="L")?"selected":""?> value="L">Laki-Laki</option>
                                        <option <?=($staff->jenis_kelamin=="P")?"selected":""?> value="P">Perempuan</option>
                                    </select></th>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <th>
                                    <select readonly name="unit" required id="" class="form-control">
                                        <option value=""></option>
                                        <?php  foreach($unit as $key => $d) { ?>
                                            <option <?=$staff->unit==$key?"selected":""?> value="<?=$key?>"><?=$d?></option>
                                        <?php }?>
                                    </select></th>
                                </tr>
                                <tr>
                                    <th>Masa Kerja</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->masa_kerja?>" name="masa_kerja" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Berhenti Tanggal</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->berhenti_tanggal?>" name="berhenti_tanggal" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Pensiun Tanggal</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->pensiun_tanggal?>" name="pensiun_tanggal" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Golongan Darah</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->golongan_darah?>" name="golongan_darah" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Pangkat Lama</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->pangkat_lama?>" name="pangkat_lama" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Pangkat Baru</th>
                                    <th>
                                    <input readonly type="text" value="<?=$staff->pangkat_baru?>" name="pangkat_baru" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Status Kepegawaian</th>
                                    <th>
                                        <select readonly name="status_staff" id="" class="form-control">
                                            <option value=""></option>
                                            <?php foreach(array("Honor"=>"Honor","PYPK"=>"PYPK","CGTY"=>"CGTY","CPTY"=>"CPTY","GTY"=>"GTY","PTY"=>"PTY") as $d) { ?>
                                            <option <?=($staff->status_staff==$d)?"selected":""?> value="<?=$d?>"><?=$d?></option>
                                            <?php }?>
                                        </select>
                                    </th>
                                </tr>
                            </table>
                            </div>
                        </div>
                        
                        <!--  RIWAYAT PENDIDIKAN -->
                        <div id="menu1" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT PENDIDIKAN</h3>
                            <table class="table table-bordered">
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
                        <div id="menu2" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT PELATIHAN</h3>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                        </div>

                        <!-- RIWAYAT JABATAN -->
                        <div id="menu3" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT JABATAN</h3>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                        <td><?=$rp->unit_kerja?></td>
                                        <td><?=$rp->nomor_sk?></td>
                                        <td><?=$rp->tmt?></td>
                                        <td><?=$rp->tanggal_sk?></td>
                                        <td><?=$rp->pejabat_pengesah?></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- RIWAYAT TUGAS TAMBAHAN -->
                        <div id="menu4" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT TUGAS TAMBAHAN</h3>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                        <td><?=$rp->unit_kerja_id?></td>
                                        <td><?=$rp->nama_tugas?></td>
                                        <td><?=$rp->nomor_sk?></td>
                                        <td><?=$rp->tmt?></td>
                                        <td><?=$rp->tanggal_sk?></td>
                                        <td><?=$rp->pejabat_pengesah?></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- RIWAYAT KEPANGKATAN -->
                        <div id="menu5" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT KEPANGKATAN</h3>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                        </div>

                        <!-- DATA KELUARGA -->
                        <div id="menu6" class="tab-pane fade">
                            <br>
                            <h3>DATA KELUARGA</h3>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                        </div>

                        <!-- DATA ANAK -->
                        <div id="menu7" class="tab-pane fade">
                            <br>
                            <h3>DATA ANAK</h3>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                        </div>

                        <!-- DATA ORANG TUA -->
                        <div id="menu8" class="tab-pane fade">
                            <br>
                            <h3>DATA ORANG TUA</h3>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                        </div>

                        <!-- DATA NILAI DP2T -->
                        <div id="menu9" class="tab-pane fade">
                            <br>
                            <h3>NILAI DP2T</h3>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
    