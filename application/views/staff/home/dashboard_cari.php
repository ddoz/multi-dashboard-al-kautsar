

<!-- Start Status area -->
    <div class="form-element-area">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Pencarian Umum</h2>
                            <p>Hasil Pencarian dari kata kunci <i><b><?=$this->input->get('key')?></b></i>.</p>
                        </div>
                        <div class="row">
                            <?php foreach($staff as $key => $s) { 
                                    $image = base_url()."assets/img/user.svg";
                                    if($s->foto!='') {
                                        $image = base_url()."uploads/".$s->foto;
                                    }
                                ?>
                            <div class="col-md-2">
                                <div class="card" style="border: 1px solid gray;border-radius:10px;padding:10px">
                                    <img class="card-img-top" src="<?=$image?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-center" style="margin-top:10px"><?=$s->nama?></h5>
                                        <a href="<?=base_url()?>staff/dashboard/detail/<?=$s->id?>" data-toggle="tooltip" data-placement="bottom" title="Detail Data Staff" class="btn btn-info btn-block"><i class="notika-icon notika-search"></i></a>
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
    <!-- End Status area-->

