<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>&nbsp;Rekapitulasi Siswa
                            <!-- <a href="<?=base_url()?>siswa/homesiswa" class="float-right" style="color:red"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                            </svg>&nbsp;</a> -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?=base_url()?>siswa/laporansiswa/export" target="_blank" method="post">
                                        <div class="form-group">
                                            <label for="">Tahun Akademik</label>
                                            <select name="ta" required class="form-control">
                                                <option value="">Pilih Tahun Akademik</option>
                                                <?php foreach($ta as $th) { foreach($th as $t) { ?>
                                                <option value="<?=$t->id?>"><?=$t->tahun_akademik ." - ".$t->app?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kelas</label>
                                            <select name="kelas" required class="form-control">
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach($kelas as $th) { foreach($th as $t) { ?>
                                                <option value="<?=$t->id?>"><?=$t->nama_kelas?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Export</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
</div>