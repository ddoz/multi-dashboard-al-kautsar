<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Peritah Kerja | SISTEM DMA AL-KAUTSAR</title>
</head>
<body onload="window.print()">


<div style="border: 1px solid #000;width:600px;padding:2px">

    <table class="table" border="0" width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td colspan="4"><center>SURAT PERINTAH KERJA</center></td>
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
            <td>:</td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered" border="1" width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td>No.</td>
            <td>JENIS PERBAIKAN</td>
        </tr>
        <?php $ket = explode("\n",$item->keterangan_proses); foreach($ket as $key=>$val) { ?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$val?></td>
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
    <table class="table table-bordered"  width="600px" cellspacing="0" cellpadding="2">
        <tr>
            <td style="border: 1px solid black;"><center>PELAKSANA PEKERJAAN</center></td>
            <td style="border: 1px solid black;" colspan="2"><center>REPORT PEKERJAAN</center></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><center>PELAKSANA</center></td>
            <td style="border-top: 1px solid black;border-right: 1px solid black;" colspan="2"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><center><?=@$list_teknisi[0]->divisi?></center></td>
            <td colspan="2" style="border-right: 1px solid black;text-align:center">
                <?php if($header->status_laporan=="1") { echo "SEDANG DIKERJAKAN"; }else if($header->status_laporan=="2") { echo "SELESAI";}?>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><center>TENAGA KERJA</center></td>
            <td colspan="2" style="border-bottom: 1px solid black;border-right: 1px solid black;"></td>
        </tr>
        <?php foreach($list_teknisi as $tk) { ?>
        <tr>
            <td>- <?=$tk->nama_teknisi; ?></td>
            <td colspan="2" style="border-left:1px solid black;"></td>
        </tr>
        <?php }?>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;" colspan="2"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;border-bottom:1px solid black;"><center>MENGETAHUI</center></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;"><center>ADMIN,</center></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border-left:1px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td style="border-left:1px solid black;"><center>RAFICO</center></td>
            <td><center>FITRIA AGUSTINA</center></td>
        </tr>
    </table>
</div>

    
</body>
</html>
