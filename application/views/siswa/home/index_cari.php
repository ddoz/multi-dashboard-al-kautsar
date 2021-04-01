<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>&nbsp;Data Hasil Pencarian
                            <a href="<?=base_url()?>siswa/homesiswa" class="float-right" style="color:red"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
                            </svg>&nbsp;</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="c-callout c-callout-info"><small class="text-muted">Hasil Pencarian dari kata kunci <i><b><?=$this->input->get("key")?></b></i></small>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="row">
                                        <?php foreach($siswa as $key => $s) { 
                                                $image = base_url()."assets/img/user.svg";
                                                if($s->avatar!='') {
                                                    $image = base_url()."uploads/".$s->avatar;
                                                }
                                            ?>
                                        <div class="col-md-3">
                                            <div class="card" style="border: 1px solid gray;border-radius:10px;padding:10px">
                                                <img class="card-img-top" src="<?=$image?>" alt="Avatar">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center" style="margin-top:10px"><?=$s->nama?></h5>
                                                    <p>Kelas : <?=$s->nama_kelas?><br>Status Kelas : <?=($s->status_kelas)?'Aktif':'Tidak Aktif'?></p>
                                                    <a href="<?=base_url()?>siswa/homesiswa/detail/<?=$s->id?>" data-toggle="tooltip" data-placement="bottom" title="Detail Data Siswa" class="btn btn-info btn-block"><svg class="c-icon">
                                <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                            </svg>&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>

                                </div>
                            
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
</div>