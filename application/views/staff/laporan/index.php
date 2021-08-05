<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Detail Data Staff
                    <div class="float-right">
                        <button class="btn btn-primary">
                        <i class="fa fa-download"></i>    
                        Download</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <div class="col-12">
                                <div class="c-callout c-callout-info">
                                <div class="text-value-lg">
                                <!-- <button class="btn btn-primary btn-xs btnmodalForm" > Tambah Data</button> -->
                                <!-- <button class="btn btn-warning btn-xs btnmodalFormImport" > Import Data</button> -->
                            </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Agama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>NIK</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>Mulai Bekerja Tanggal</th>
                                            <th>Lama Bekerja</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            </div>
                            <!-- /.col-->
                            </div>
                            <!-- /.row-->
                        
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



        <div class="modal" id="modalForm" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form" action="<?=base_url()?>staff/kelolastaff/simpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2>Form Staff</h2>
                    <input type="hidden" name="app_id" id="app_id_input">
                    <input type="hidden" name="id" id="id_input">
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="avatar">
                    </div>
                    <?=buildForm($form)?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalFormImport" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formImport" action="<?=base_url()?>staff/kelolastaff/simpanimport">
                <div class="modal-body">
                    <h2>Form Import Staff</h2>
                    <input type="hidden" name="app_id" id="app_id_import_input">
                    <a href="<?=base_url()?>assets/Template_import_staff.xlsx">Download Template</a>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file_import" id="file_import">
                        <textarea name="data" class="form-control" readonly id="data" cols="30" rows="10"></textarea>
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


    <div class="modal" id="modalHapus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>staff/kelolastaff/hapus">
                <div class="modal-body">
                    <h2>Hapus data ini?</h2>
                    <input type="hidden" name="id" id="id_input_hapus">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya Hapus Data</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>