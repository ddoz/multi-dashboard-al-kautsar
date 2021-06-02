<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Siswa - Al-Kautsar</title>
    <style>
            /** 
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark {
                position: fixed;

                /** 
                    Set a position in the page for your image
                    This should center it vertically
                **/
                bottom:   10cm;
                left:     5.5cm;

                /** Change image dimensions**/
                width:    8cm;
                height:   8cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
                opacity: 0.2;
            }
        </style>
</head>
<body>
<div id="watermark">
            <img src="<?='data:image/png;base64,' . base64_encode(file_get_contents(base_url().'assets/img/alkautsar.png'))?>" height="100%" width="100%" />
        </div>
    <div id="content">
    <table width="80%" cellspacing="0" align="center" cellpadding="0">
        <tr>
            <td align="center" width="100">
                <img src="<?='data:image/png;base64,' . base64_encode(file_get_contents(base_url().'assets/img/alkautsar.png'))?>" width="100" alt="">
            </td>
            <td align="center">
                <h2>BIODATA SISWA</h2>
                <h4>UNIT ...... TP ...... / ....</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <h4>Alamat : Jl. Soekarno Hatta Rajabasa Bandar Lampung Telp. 0721-788410</h4>
            </td>
        </tr>
    </table>
    <table width="80%" cellspacing="0" align="center" cellpadding="0">
        
        <tr>
            <td>Nama Lengkap</td>
            <td>: <?=$item->nama?></td>
        </tr>
        <tr>
            <td>NIS/NISN</td>
            <td>: <?=$item->nis?> / <?=$item->nisn?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?=$item->jenis_kelamin?></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td>: <?=$item->tempat_lahir?> <?=$item->tanggal_lahir?></td>
        </tr>
        <tr>
            <td>Alamat Tempat Tinggal</td>
            <td>: <?=$item->alamat_tempat_tinggal?></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: <?=$item->no_hp?></td>
        </tr>
        <tr>
            <td>Nama Ayah</td>
            <td>: <?=$item->ayah_nama?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>: <?=$item->ayah_pekerjaan?></td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>: <?=$item->ibu_nama?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>: <?=$item->ibu_pekerjaan?></td>
        </tr>
        <tr>
            <td>Alamat Orang Tua</td>
            <td>: <?=$item->alamat?></td>
        </tr>
        <tr>
            <td>No SKHUN</td>
            <td>: <?=$item->skhun?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>: <?=$item->sekolah_asal?></td>
        </tr>
        <tr>
            <td>Tahun Masuk</td>
            <td>: <?=$item->tahun_masuk?></td>
        </tr>
    </table>
    </div>
</body>
</html>