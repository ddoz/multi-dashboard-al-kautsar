<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>&nbsp;Data Keluarga Yang Bersekolah
                            <!-- <a href="<?=base_url()?>siswa/homesiswa" class="float-right" style="color:red"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                            </svg>&nbsp;</a> -->
                        </div>
                        <div class="card-body">
                        <div class="row">
                        <?php foreach($siswa as $key => $val) { 
                            echo "<h4>Nomor KK : ".$key."</h4>";
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
                            echo "";
                    } ?>
                    </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
</div>