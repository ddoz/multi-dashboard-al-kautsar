
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <p>Menampilkan Data Keluarga Siswa yang bersekolah</p>
                    </div>
                    <div class="row">
                        <?php foreach($siswa as $key => $val) { 
                            echo "<div class='panel panel-default'><div class='panel-heading'><div class='panel-title'>Nomor KK : ".$key."</div></div><div class='panel-body'>";
                            foreach($val as $key => $v) { ?> 
                                <?php if($key=="0") { ?>
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Status Kelas</th>
                                    <th>Tahun Masuk</th>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td><?=$v->nama?></td>
                                    <td><?=$v->nama_kelas?></td>
                                    <td><?=($v->status)?"Aktif":"Tidak Aktif"?></td>
                                    <td><?=$v->tahun_masuk?></td>
                                </tr>
                                <?php if($key==count($val)-1) { ?>
                            </table>
                            </div>
                            <?php }?>
                        <?php }
                            echo "</div></div></div>";
                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>