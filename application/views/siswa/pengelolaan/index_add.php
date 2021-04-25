<div class="container-fluid">
        <div class="fade-in">

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                    </svg>&nbsp;Tambah Data</div>
                <div class="card-body">
                   <form id="form2" action="<?=base_url()?>siswa/pengelolaankelas/simpan2" enctype="multipart/form-data">
                        <input type="hidden" name="app_id" value="<?=$this->uri->segment(4)?>">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class=form-control name="avatar">
                            <span> (tipe file jpg dan maximal 200kb)</span>
                        </div>
                        <?=buildForm($form)?>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                   </form>
                </div>
                </div>
            </div>
            <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        </div>