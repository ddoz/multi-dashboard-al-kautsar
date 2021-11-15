<script>

$("#submitLaporan").submit(function(e) {
    e.preventDefault();

    $("#contentLaporan").load("<?=base_url()?>dma/laporandma/lihat",{bulan:$("#bulan").val(),tahun:$("#tahun").val()},function(res) {
    });

});

</script>
