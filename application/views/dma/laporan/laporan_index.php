<div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-0">Laporan DMA</h4>


                </div>
                </div>
                <hr>
                <form id="submitLaporan" method="post">
                        <div class="form-group">
                            <label for="">Bulan</label>
                            <?php 
                                $arr_bulan = array(
                                    "1" => "Januari",
                                    "2" => "Februari",
                                    "3" => "Maret",
                                    "4" => "April",
                                    "5" => "Mei",
                                    "6" => "Juni",
                                    "7" => "Juli",
                                    "8" => "Agustus",
                                    "9" => "September",
                                    "10" => "Oktober",
                                    "11" => "November",
                                    "12" => "Desember",
                                );
                            ?>
                            <select name="bulan" id="bulan" class="form-control">
                                <?php foreach($arr_bulan as $key => $bln) { ?>
                                    <option value="<?=$key?>"><?=$bln?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun</label>
                            <?php $tahun_awal = "2021"; ?>
                            <select name="tahun" id="tahun" class="form-control">
                                <?php for($i=$tahun_awal;$i<=date('Y');$i++){ ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button class="btn btn-info"><i class="fas fa-search"></i>    LIHAT LAPORAN</button>
                    </form>
                
                    <div id="loaderLaporan"></div>
                    <div id="contentLaporan"></div>
                
            </div>
        </div>