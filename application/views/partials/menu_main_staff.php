<div class="main-menu-area mg-tb-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li <?=($menu=='home')?'class="active"':''?>><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li <?=($menu=='laporan')?'class="active"':''?>><a data-toggle="tab" href="#laporan"><i class="notika-icon notika-bar-chart"></i> Laporan</a>
                        </li>
                        <li <?=($menu=='pengelolaan')?'class="active"':''?>><a data-toggle="tab" href="#Pengelolaan"><i class="notika-icon notika-edit"></i> Pengelolaan</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane <?=($menu=='home')?'in active':''?> notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?=base_url()?>staff/dashboard">Pencarian Data</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div id="laporan" class="tab-pane <?=($menu=='laporan')?'in active':''?> notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?=base_url()?>staff/laporan/pegawai">Pegawai</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Pengelolaan" class="tab-pane <?=($menu=='pengelolaan')?'in active':''?> notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?=base_url()?>staff/pengelolaanstaff">Pegawai</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>