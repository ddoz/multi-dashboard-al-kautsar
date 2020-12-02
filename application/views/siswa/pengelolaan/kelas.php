<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-settings"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Pengelolaan Kelas</h2>
                                    <p>Selamat datang, <span class="bread-ntd">ini halaman pengelolaan data kelas</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
    
    
<?php foreach($app as $listApp) { ?>
    
    <!-- Data Table area Start-->
    <div class="data-table-area" style="margin-bottom:25px">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Kelas <?=$listApp->app?></h2>
                            <p>Berikut merupakan data keseluruhan.</p>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalseven"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-<?=$listApp->app_id?>" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Kelas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Data Table area End-->
    <?php }?>



    <div class="modal animated shake" id="myModalseven" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Form Tambah Kelas</h2>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>