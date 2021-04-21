<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg>&nbsp;Detail Data Staff</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="nav-tabs-boxed">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a role="tab" class="nav-link active" data-toggle="tab" href="#home">IDENTITAS DIRI</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu1">RIWAYAT PENDIDIKAN</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu2">RIWAYAT PELATIHAN/SEMINAR/WORKSHOP/BIMTEK/DLL</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu3">RIWAYAT JABATAN</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu4">RIWAYAT TUGAS TAMBAHAN</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu5">RIWAYAT KEPANGKATAN</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu6">DATA KELUARGA</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu7">DATA ANAK</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu8">DATA ORANG TUA</a></li>
                                <li class="nav-item"><a role="tab" class="nav-link" data-toggle="tab" href="#menu9">NILAI DP2T (LIMA TAHUN TERAKHIR)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- IDENTITAS DIRI -->
                        <div id="home" role="tabpanel" class="tab-pane active">
                            <br>
                            <h4>IDENTITAS DIRI</h4>
                            <div class="table-responsive">
                                <form action="<?=base_url()?>staff/kelolastaff/ubah" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" value="<?=$staff->id?>">
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
                                            <img class="card-img-top img-thumbnail" style="width:100px;margin-left:10px;margin-right:10px;margin-top:10px" width="80" src="<?=$image?>" alt="Card image cap">
                                            <div class="card-body">
                                                <br>
                                                <input type="file" name="avatar" id="">
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>
                                        <input type="text" value="<?=$staff->nama?>" name="nama" class="form-control" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Gelar Depan</th>
                                    <th>
                                        <input type="text" value="<?=$staff->gelar_depan?>" name="gelar_depan" required class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Gelar Belakang</th>
                                    <th>
                                    <input type="text" value="<?=$staff->gelar_depan?>" name="gelar_depan" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <th>
                                    <input type="text" value="<?=$staff->nik?>" name="nik" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>NYP/NIP</th>
                                    <th>
                                    <input type="text" value="<?=$staff->nip_npy?>" name="nip_npy" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <th>
                                    <input type="text" value="<?=$staff->agama?>" name="agama" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>
                                    <select name="jenis_kelamin" required id="" class="form-control">
                                        <option <?=($staff->jenis_kelamin=="L")?"selected":""?> value="L">Laki-Laki</option>
                                        <option <?=($staff->jenis_kelamin=="P")?"selected":""?> value="P">Perempuan</option>
                                    </select>    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>
                                    <input type="text" value="<?=$staff->email?>" name="email" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th>
                                    <input type="text" value="<?=$staff->alamat?>" name="alamat" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <th>
                                    <input type="text" value="<?=$staff->tempat_lahir?>" name="tempat_lahir" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th>
                                    <input type="text" value="<?=$staff->tanggal_lahir?>" name="tanggal_lahir" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <th>
                                    <input type="text" value="<?=$staff->no_hp?>" name="no_hp" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Jenjang Pendidikan</th>
                                    <th>
                                    <select name="jenis_kelamin" required id="" class="form-control">
                                        <option <?=($staff->jenis_kelamin=="L")?"selected":""?> value="L">Laki-Laki</option>
                                        <option <?=($staff->jenis_kelamin=="P")?"selected":""?> value="P">Perempuan</option>
                                    </select></th>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <th>
                                    <select name="unit" required id="" class="form-control">
                                        <option value=""></option>
                                        <?php  foreach($unit as $key => $d) { ?>
                                            <option <?=$staff->unit==$key?"selected":""?> value="<?=$key?>"><?=$d?></option>
                                        <?php }?>
                                    </select></th>
                                </tr>
                                <tr>
                                    <th>Masa Kerja</th>
                                    <th>
                                    <input type="text" value="<?=$staff->masa_kerja?>" name="masa_kerja" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Berhenti Tanggal</th>
                                    <th>
                                    <input type="text" value="<?=$staff->berhenti_tanggal?>" name="berhenti_tanggal" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Pensiun Tanggal</th>
                                    <th>
                                    <input type="text" value="<?=$staff->pensiun_tanggal?>" name="pensiun_tanggal" required class="form-control datepicker">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Golongan Darah</th>
                                    <th>
                                    <input type="text" value="<?=$staff->golongan_darah?>" name="golongan_darah" required class="form-control">    
                                    </th>
                                </tr>
                                <tr>
                                    <th>Pangkat Lama</th>
                                    <th>
                                    <input type="text" value="<?=$staff->pangkat_lama?>" name="pangkat_lama" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Pangkat Baru</th>
                                    <th>
                                    <input type="text" value="<?=$staff->pangkat_baru?>" name="pangkat_baru" required class="form-control">    
                                        </th>
                                </tr>
                                <tr>
                                    <th>Status Kepegawaian</th>
                                    <th>
                                        <select name="status_staff" id="" class="form-control">
                                            <option value=""></option>
                                            <?php foreach(array("Honor"=>"Honor","PYPK"=>"PYPK","CGTY"=>"CGTY","CPTY"=>"CPTY","GTY"=>"GTY","PTY"=>"PTY") as $d) { ?>
                                            <option <?=($staff->status_staff==$d)?"selected":""?> value="<?=$d?>"><?=$d?></option>
                                            <?php }?>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </th>
                                </tr>
                            </table>
                            </form>
                            </div>
                        </div>
                        
                        <!--  RIWAYAT PENDIDIKAN -->
                        <div id="menu1" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT PENDIDIKAN</h3>
                            <a data-toggle="modal" href="#modalRiwayatPendidikan" class="pull-right btn btn-primary btn-sm">Tambah Data</a><br><br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Nama Sekolah/Universitas</th>
                                    <th>Jurusan/Program Study</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Lulus</th>
                                    <th></th>
                                </tr>
                                <?php foreach($riwayat_pendidikan as $key => $rp) { ?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td><?=$rp->tingkat_pendidikan?></td>
                                    <td><?=$rp->nama_sekolah?></td>
                                    <td><?=$rp->jurusan?></td>
                                    <td><?=$rp->tahun_masuk?></td>
                                    <td><?=$rp->tahun_lulus?></td>
                                    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusriwayatpendidikan/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>

                        <!-- RIWAYAT PELATIHAN -->
                        <div id="menu2" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT PELATIHAN</h3>
                            <a data-toggle="modal" href="#modalRiwayatPelatihan" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusriwayatpelatihan/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- RIWAYAT JABATAN -->
                        <div id="menu3" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT JABATAN</h3>
                            <a data-toggle="modal" href="#modalRiwayatJabatan" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusriwayatjabatan/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- RIWAYAT TUGAS TAMBAHAN -->
                        <div id="menu4" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT TUGAS TAMBAHAN</h3>
                            <a data-toggle="modal" href="#modalRiwayatTugasTambahan" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusriwayattugastambahan/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- RIWAYAT KEPANGKATAN -->
                        <div id="menu5" class="tab-pane fade">
                            <br>
                            <h3>RIWAYAT KEPANGKATAN</h3>
                            <a data-toggle="modal" href="#modalRiwayatKepangkatan" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusriwayatkepangkatan/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- DATA KELUARGA -->
                        <div id="menu6" class="tab-pane fade">
                            <br>
                            <h3>DATA KELUARGA</h3>
                            <a data-toggle="modal" href="#modalKeluarga" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapuskeluarga/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- DATA ANAK -->
                        <div id="menu7" class="tab-pane fade">
                            <br>
                            <h3>DATA ANAK</h3>
                            <a data-toggle="modal" href="#modalAnak" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusanak/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- DATA ORANG TUA -->
                        <div id="menu8" class="tab-pane fade">
                            <br>
                            <h3>DATA ORANG TUA</h3>
                            <a data-toggle="modal" href="#modalOrtu" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
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
                                        <th></th>
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
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusortu/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- DATA NILAI DP2T -->
                        <div id="menu9" class="tab-pane fade">
                            <br>
                            <h3>NILAI DP2T</h3>
                            <a data-toggle="modal" href="#modalNilai" class="pull-right btn btn-primary btn-sm">Tambah Data</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Nilai</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach($dpt as $key => $rp) { ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$rp->tahun?></td>
                                        <td><?=$rp->nilai?></td>
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('hapus data ini?')" href="<?=base_url()?>staff/kelolastaff/hapusnilai/<?=$staff->id?>/<?=$rp->id?>">hapus</a></td>
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
        
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>


        <div class="modal" id="modalRiwayatPendidikan" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanriwayatpendidikan">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Riwayat Pendidikan</h2>
                    <div class="form-group">
                        <label for="">Tingkat Pendidikan</label>
                        <input type="text" name="tingkat_pendidikan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sekolah/Universitas</label>
                        <input type="text" name="nama_sekolah" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan/Program Studi</label>
                        <input type="text" name="jurusan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Masuk</label>
                        <input type="text" name="tahun_masuk" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modalRiwayatPelatihan" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanriwayatpelatihan">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Riwayat Pelatihan</h2>
                    <div class="form-group">
                        <label for="">Nama Riwayat</label>
                        <input type="text" name="nama_riwayat" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Penyelenggara</label>
                        <input type="text" name="penyelenggara" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor STTP</label>
                        <input type="text" name="no_sttp" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal STTP</label>
                        <input type="text" name="tanggal_sttp" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="text" name="tanggal_mulai" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Selesai</label>
                        <input type="text" name="tanggal_selesai" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Jam</label>
                        <input type="text" name="jumlah_jam" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalRiwayatJabatan" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanriwayatjabatan">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Riwayat Pelatihan</h2>
                    <div class="form-group">
                        <label for="">Jenis Jabatan</label>
                        <input type="text" name="jenis_jabatan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Unit Kerja</label>
                        <select name="unit_kerja" required id="" class="form-control">
                            <option value=""></option>
                            <?php  foreach($unit as $key => $d) { ?>
                                <option value="<?=$key?>"><?=$d?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor SK</label>
                        <input type="text" name="nomor_sk" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">TMT</label>
                        <input type="text" name="tmt" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal SK</label>
                        <input type="text" name="tanggal_sk" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Pejabat Yang Mengesahkan</label>
                        <input type="text" name="pejabat_pengesah" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalRiwayatTugasTambahan" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanriwayattugastambahan">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Riwayat Tugas Tambahan</h2>
                    <div class="form-group">
                        <label for="">Nama Tugas</label>
                        <input type="text" name="nama_tugas" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Unit Kerja</label>
                        <select name="unit_kerja_id" required id="" class="form-control">
                            <option value=""></option>
                            <?php  foreach($unit as $key => $d) { ?>
                                <option value="<?=$key?>"><?=$d?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor SK</label>
                        <input type="text" name="nomor_sk" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">TMT</label>
                        <input type="text" name="tmt" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal SK</label>
                        <input type="text" name="tanggal_sk" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Pejabat Yang Mengesahkan</label>
                        <input type="text" name="pejabat_pengesah" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalRiwayatKepangkatan" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanriwayatkepangkatan">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Riwayat Kepangkatan</h2>
                    <div class="form-group">
                        <label for="">Pangkat/Golongan</label>
                        <input type="text" name="pangkat_golongan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Regular/Pilihan</label>
                        <input type="text" name="regular_pilihan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor SK</label>
                        <input type="text" name="nomor_sk" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">TMT</label>
                        <input type="text" name="tmt_pangkat" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal SK</label>
                        <input type="text" name="tanggal_sk" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Pejabat Yang Mengesahkan</label>
                        <input type="text" name="pejabat_pengesah" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalKeluarga" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpankeluarga">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Data Keluarga</h2>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama_pasangan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Tunjangan</label>
                        <input type="text" name="tunjangan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Menikah</label>
                        <input type="text" name="tanggal_menikah" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" name="pekerjaan" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalAnak" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpananak">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Data Anak</h2>
                    <div class="form-group">
                        <label for="">Nama Anak</label>
                        <input type="text" name="nama_anak" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Status Anak</label>
                        <select name="status_anak" required class="form-control">
                            <option value="Kandung">Kandung</option>
                            <option value="Angkat">Angkat</option>
                            <option value="Tiri">Tiri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Anak Ke</label>
                        <input type="text" name="anak_ke" autocomplete="false" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalOrtu" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpanortu">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Data Orang Tua</h2>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat lahir</label>
                        <input type="text" name="tempat_lahir" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" autocomplete="false" required class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalNilai" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="<?=base_url()?>staff/kelolastaff/simpannilai">
                <input type="hidden" name="staff_id" value="<?=$staff->id?>">
                <div class="modal-body">
                    <h2>Form Data Nilai DP2T</h2>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="text" name="nilai" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>