<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Pegawai</title>
    <style>
        table{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
    <center><h2><u>DATA PEGAWAI YAYASAN AL KAUTSAR</u></h2></center>
    <?php 
                                        $image = base_url()."assets/img/user.svg";
                                        if($staff->foto!='') {
                                            $image = base_url()."uploads/".$staff->foto;
                                        }
                                    ?>
    <b>1. IDENTITAS PEGAWAI</b>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                               
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>
                                        : <?=$staff->nama?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gelar Depan</td>
                                    <td>
                                        : <?=$staff->gelar_depan?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gelar Belakang</td>
                                    <td>
                                    : <?=$staff->gelar_belakang?>   
                                    </td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>
                                    : <?=$staff->nik?>   
                                    </td>
                                </tr>
                                <tr>
                                    <td>NYP/NIP</td>
                                    <td>
                                    : <?=$staff->nip_npy?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>
                                    : <?=$staff->agama?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td> : <?=($staff->jenis_kelamin=="L")?"Laki-Laki-Laki":"Perempuan"?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                    : <?=$staff->email?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                    : <?=$staff->alamat?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>
                                    : <?=$staff->tempat_lahir?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>
                                    : <?=$staff->tanggal_lahir?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>
                                    <?=$staff->no_hp?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Jenjang Pendidikan</td>
                                    <td>: <?=$staff->jenjang_pendidikan?></td>
                                </tr>
                                <tr>
                                    <td>Unit</td>
                                    <td>
                                    : <?=$staff->unit?></td>
                                </tr>
                                <tr>
                                        <?php 
                                            $masa_kerja = MasaKerja($staff->tanggal_masuk_kerja)
                                        ?>
                                    <td>Masa Kerja</td>
                                    <td>
                                    : <?=$masa_kerja?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Berhenti Tanggal</td>
                                    <td>
                                    : <?=$staff->berhenti_tanggal?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Pensiun Tanggal</td>
                                    <td>
                                    : <?=$staff->pensiun_tanggal?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>
                                    : <?=$staff->golongan_darah?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pangkat Lama</td>
                                    <td>
                                    : <?=$staff->pangkat_lama?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Pangkat Baru</td>
                                    <td>
                                    : <?=$staff->pangkat_baru?>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Status Kepegawaian</td>
                                    <td>: <?=$staff->status_staff?>
                                    </td>
                                </tr>
                            </table>
    
                    <br/><br/>

                    <b>2. RIWAYAT PENDIDIKAN</b><br/>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>3. RIWAYAT PELATIHAN</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>4. RIWAYAT JABATAN</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>5. RIWAYAT TUGAS TAMBAHAN</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>6. RIWAYAT KEPANGKATAN</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>7. DATA KELUARGA</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>8. DATA ANAK</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>9. DATA ORANG TUA</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
                    <br/><br/>
                    <b>10. NILAI DP2T</b>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
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
</body>
</html>