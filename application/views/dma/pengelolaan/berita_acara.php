<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berit Acara Selesai Pekerjaan | SISTEM DMA AL-KAUTSAR</title>
</head>
<body onload="window.print()">


<div style="border: 1px solid #000;width:600px;padding:2px">

    <table class="table" border="0" width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td colspan="4"><center>BERITA ACARA SELESAI PEKERJAAN</center></td>
        </tr>
        <tr>
            <td>Nama (Pelapor)</td>
            <td>: <?=$header->nama?></td>
            <td>No. T. Terima</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Unit</td>
            <td>:</td>
            <td>Tgl. Terima</td>
            <td>: <?=date('d-m-Y',strtotime($header->created_at))?></td>
        </tr>
        <tr>
            <td>DVS</td>
            <td>:</td>
            <td>Tgl. Selesai</td>
            <td>: <?=date('d-m-Y',strtotime($header->done_at))?></td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered" border="1" width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td>No.</td>
            <td>JENIS PERBAIKAN</td>
            <td>HASIL PERBAIKAN</td>
        </tr>
        <?php $ket = explode("\n",$item->keterangan_proses); foreach($ket as $key=>$val) { ?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$val?></td>
            <td><?=$item->keterangan_hasil?></td>
        </tr>
        <?php }?>
    </table>
    <!-- 
    <table class="table table-bordered" border="1">
        <tr>
            <td>No.</td>
            <td>MATERIAL YANG DIPERLUKAN</td>
        </tr>
        <tr>
            <td>1</td>
            <td></td>
        </tr>
    </table> -->
    <br>
    <table  width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td><center>Pelaksana</center></td>
            <td style="border: 1px solid black;"><center>KETERANGAN</center></td>
            <td style="border: 1px solid black;">SPV</td>
        </tr>
        <tr>
            <td><center></center></td>
            <td style="border-left: 1px solid black;"><center></center></td>
            <td style="border-right: 1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td><center></center></td>
            <td style="border-left: 1px solid black;"><center></center></td>
            <td style="border-right: 1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td style="">
            <table border="0" width="100%">

                <tr>
                <?php foreach($list_teknisi as $tk) { ?> 
                    <td><?=$tk->nama_teknisi; ?></td>
                    <?php }?>
                </tr>
            </table>
            </td>
            <td style="border-left: 1px solid black;border-bottom: 1px solid black;"><center></center></td>
            <td style="border-right: 1px solid black;border-bottom: 1px solid black;">&nbsp;</td>
        </tr>
    </table>
                    <br>
    <table width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td style="border: 1px solid black;" colspan="3">Mengetahui,</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid black;border-right: 1px solid black;">Unit yang diperbaiki,</td>
            <td style="border-right: 1px solid black;">Divisi Maintenance,</td>
            <td style="border-right: 1px solid black;">Skala Kepuasan :</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid black;border-right: 1px solid black;">&nbsp;</td>
            <td style="border-right: 1px solid black;"></td>
            <td style="border-right: 1px solid black;">1. Puas</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid black;border-right: 1px solid black;">&nbsp;</td>
            <td style="border-right: 1px solid black;"></td>
            <td style="border-right: 1px solid black;">2. Baik</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid black;border-right: 1px solid black;">&nbsp;</td>
            <td style="border-right: 1px solid black;"></td>
            <td style="border-right: 1px solid black;">3. Cukup</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid black;border-right: 1px solid black;">(__________________)</td>
            <td style="border-right: 1px solid black;text-align:center">Ir. SONY TRIANTO</td>
            <td style="border-right: 1px solid black;">4. Kurang Puas</td>
        </tr>
        <tr>
        <td style="border:1px solid black;text-align:center" colspan="3">DIVISI MAINTENANCE AL KAUTSAR</td>
        </tr>
        <tr>
            
        </tr>
    </table>
</div>

    
</body>
</html>
