<div class="container-fluid">
        <div class="fade-in">
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Data Siswa Kelas <?=$kelas->nama_kelas?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="row">
                            <!-- /.col-->
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="datatable-siswa-kelas" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>Nama Siswa</th>
                                                <th>Nama Kelas</th>
                                                <th>Status</th>
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
        
            </div>
            <!-- /.row-->
        </div>
        </div>



    <div class="modal" id="modalHapus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formHapus" action="<?=base_url()?>siswa/kelolakelas/hapussiswakelas">
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