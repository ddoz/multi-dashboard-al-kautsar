<div class="container-fluid">
        <div class="fade-in">
            <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><svg class="c-icon">
                        <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
                    </svg>&nbsp;Pengelolaan Data Perbaikan
                
                    <div class="float-right">
                        <a href="<?=base_url()?>dma/kelolaperbaikan/spk/<?=$header->id?>" target="_blank" class="btn btn-primary" ><i class="fas fa-print"></i> SPK</a>
                        <a href="<?=base_url()?>dma/kelolaperbaikan/bas/<?=$header->id?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> BERITA ACARA SELESAI PEKERJAAN</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <h5>Detail Laporan</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Pelapor</th>
                                            <td>: <?=$header->nama?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Layanan</th>
                                            <td>: <?=$header->nama_layanan?></td>
                                        </tr>
                                        <tr>
                                            <th>Gedung</th>
                                            <td>: <?=$header->nama_gedung?></td>
                                        </tr>
                                        <tr>
                                            <th>Ruangan</th>
                                            <td>: <?=$header->nama_ruangan?></td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan Laporan</th>
                                            <td>: <?=$header->keterangan_laporan?></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Laporan</th>
                                            <td>: <?=date("d M Y H:i:s",strtotime($header->created_at));?></td>
                                        </tr>
                                        <tr>
                                            <th>Gambar</th>
                                            <td>: 

                                                <?php if($header->gambar_laporan!=""){?>
                                                    <img width="200" src="<?=base_url()?>uploads/dma/<?=$header->gambar_laporan?>">
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Pengerjaan</th>
                                            <td>: 

                                                <?php if($item!=null){?>
                                                    <span class="label label-info" style="font-size:1em"><?=returnLaporanPerbaikan($header->status_laporan)?></span>
                                                <?php } else { ?>
                                                    <span class="label label-danger" style="font-size:1em">Belum Dikerjakan</span>
                                                <?php }?>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                            <?php if($item!=null){?>
                                    <div class="col-md-6">
                                        <h5>Detail Pengerjaan</h5>
                                        <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Teknisi</th>
                                                <td>
                                                    <ol>
                                                    <?php 
                                                        foreach($list_teknisi as $tk) {
                                                            echo "<li>$tk->nama_teknisi</li>";
                                                        }
                                                    ?>
                                                    </ol>    
                                            </td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Pekerjaan</th>
                                                <td><textarea readonly disabled style="resize: none;" id="" cols="30" rows="10"><?=$item->keterangan_proses?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th>Waktu Mulai Pengerjaan</th>
                                                <td><?=date("d M Y H:i:s",strtotime($header->start_at));?></td>
                                            </tr>
                                            <tr>
                                                <th>Selisih Waktu Laporan dan Mulai Pengerjaan</th>
                                                <td> <?php
                                                    $order = new DateTime($header->created_at);
                                                    $start = new DateTime($header->start_at);
                                                    $interval = $order->diff($start);
                                                    echo $interval->format("%d hari %h jam %i menit");
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <th>Waktu Selesai</th>
                                                <td> <?=($header->done_at!=null)?date("d M Y H:i:s",strtotime($header->done_at)):"-";?></td>
                                            </tr>
                                            <tr>
                                                <th>Lama Pengerjaan</th>
                                                <td> <?php
                                                    if($header->done_at!=null) {
                                                        $order = new DateTime($header->created_at);
                                                        $finish = new DateTime($header->done_at);
                                                        $interval = $order->diff($finish);
                                                    echo $interval->format("%d hari %h jam %i menit");
                                                    }else {
                                                        echo "-";
                                                    }
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gambar Penyelesaian</th>
                                                <td> <?php if($item->hasil_foto!=""){?>
                                                    <img width="200" src="<?=base_url()?>uploads/dma/<?=$item->hasil_foto?>">
                                                <?php }?></td>
                                            </tr>
                                            <?php if($perbaikan_barang!=null) {
                                                ?>
                                                <tr>
                                                    <td colspan="2">Kebutuhan Barang</td>
                                                </tr>
                                                <?php
                                                foreach($perbaikan_barang as $pb) {
                                                    ?>
                                                    <tr>
                                                        <td><?=$pb->nama_barang?></td>
                                                        <td><?=$pb->jumlah?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }?>
                                            <?php if(isSuper() && $header->done_at==null) { ?>
                                            <tr>
                                                <td><button type="button" id="btnSelesai" data-id="<?=$header->id?>,<?=$item->id?>" class="btn btn-success"><i class="notika-icon notika-checked"></i>&nbsp;SELESAIKAN PEKERJAAN</button></td>
                                                <td></td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                            </div>
                                    </div>
                            <?php }else { if(isSuper()) {?>
                                <form id="form_proses_perbaikan" class="col-md-6">
                                    <input type="hidden" name="id" value="<?=$header->id?>">
                                    <div class="form-group">
                                        <label>Teknisi</label>
                                        <select name="user_teknisi[]" class="form-control select2" required multiple="true">
                                            <?php foreach($teknisi as $tk) { ?>
                                                <option value="<?=$tk->id?>"><?=$tk->nama_teknisi?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Proses</label>
                                        <textarea class="form-control" required name="keterangan_proses"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <button class="btn btn-primary" type="submit"><i class="notika-icon notika-sent"></i>&nbsp;Proses Pengerjaan</button>
                                    </div>
                                </form>
                            <?php }}?>
                            </div>
                            
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
    <!-- Data Table area End-->
    <div class="modal" id="modalForm" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formSelesai" action="<?=base_url()?>dma/pengelolaanperbaikan/selesai" enctype="multipart/form-data">
                <div class="modal-body">
                    <h2>Form Penyelesaian Laporan</h2>
                    <input type="hidden" name="id" id="id_input">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" id="idBarang">
                                <option value="">Pilih Barang</option>
                                <?php foreach($barang as $br) { ?>
                                <option value="<?=$br->id?>"><?=$br->nama_barang?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-4"><input class="form-control" id="jumlahPemakaian" placeholder="Jumlah Pemakaian"></div>
                        <div class="col-md-4">
                        <button class="btn btn-primary btn-sm btnTambahKeTable" type="button">Tambah</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table" id="tableBarangPenyelesaian">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Barang</th>
                                <th>Jumlah Pemakaian</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <button type="button" class="btn btn-danger btn-sm" id="delete-row">Delete Row</button>
                        </div>
                        <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Gambar Bukti Penyelesaian</label>
                            <input type="file" class="form-control" required name="file">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Keterangan Proses</label>
                            <textarea class="form-control" required name="keterangan_proses"></textarea>
                        </div>
                    </div>
                        

                </div>
                <div class="modal-footer">
                    <br>
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
                <form id="formHapus" action="<?=base_url()?>dma/pengelolaanlayanan/hapus">
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