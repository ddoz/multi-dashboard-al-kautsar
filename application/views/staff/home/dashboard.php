

<!-- Start Status area -->
    <div class="form-element-area">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Pencarian Umum</h2>
                            <p>Anda dapat memasukkan Nama.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <form method="get" action="<?=base_url()?>staff/dashboard/cari">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="key">
                                    <button type="submit" class="btn btn-warning btn-sm">Cari</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->