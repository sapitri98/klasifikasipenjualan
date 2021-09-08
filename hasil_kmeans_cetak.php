<?php 
$ATT['M1'] = 'Sangat Laris';
$ATT['M2'] = 'Cukup Laris';
$ATT['M3'] = 'Kurang Laris';

$rows = $db->get_results("SELECT * FROM tb_dataset GROUP BY nomor");
foreach ($rows as $row) {
 $ALTERNATIF[$row->nomor]= $row->ket_dataset;
}

$data_awal = $db->get_row("SELECT * FROM tb_penjualan ORDER BY tanggal_penjualan ASC");
$data_akhir = $db->get_row("SELECT * FROM tb_penjualan ORDER BY tanggal_penjualan DESC");
?>
<h4>Periode <?=$data_awal->tanggal_penjualan?> - <?=$data_akhir->tanggal_penjualan?></h4>
<div class="table-responsive">
    <table class="table table-block">    
        <thead><tr>
            <td>Kode</td>
            <td>Nama</td>
            <td>centroid</td>
            <!-- <td>Real Label</td> -->
        </tr></thead>                
        <?php 
        $keanggotaan = $_SESSION['keanggotaan'];
        $chart=$_SESSION['chart'];
        $CALLSET=$_SESSION['callset'];

        $benar=0;
        foreach($ALTERNATIF as $key => $val):
            if($ATT[$keanggotaan[$key]]==$CALLSET[$val])
                {
                    $benar++;
                }?>
            <tr>
                <td><?=$key?></td>
                <td><?=$val?></td> 
                <td><?=$ATT[$keanggotaan[$key]]?></td>   
                <!-- <td><?=$CALLSET[$val]?></td>    -->                  
            </tr>
        <?php endforeach?>
    </table>
</div>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Akurasi!</h4>
  <p>Jumlah Benar : <?=$benar?> dengan akurasi <?=$benar/count($ALTERNATIF)*100?> %</p>
  <?php foreach($_SESSION['chart'] as $key => $value):?>
  <p><?=$value['name']?> : <?=$value['y']?></p>
<?php endforeach;?>
</div>
<p>Dicetak Oleh : <?=$_SESSION['login']?></p>
<!-- <div class="panel-body">
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/exporting.js"></script>        
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
    <!-- <script>
        $(function () {
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Grafik Hasil Clustering'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: <?=json_encode($chart)?>
                }]
            });
        });
    </script> -->
</div>