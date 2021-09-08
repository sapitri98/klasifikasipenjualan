   <?php 
    $chart = array();
   $rows = $db->get_results("SELECT month(tanggal_penjualan) as bulan, sum(grandtotal) as total FROM tb_penjualan group by month(tanggal_penjualan)");
   $BULAN = array(
    '1'=>'Januari',
    '2'=>'Februari',
    '3'=>'Maret',
    '4'=>'April',
    '5'=>'Mei',
    '6'=>'Juni',
    '7'=>'Juli',
    '8'=>'Agustus',
    '9'=>'September',
    '10'=>'Oktober',
    '11'=>'November',
    '12'=>'Desember');
   // Nanti kakak isi dan lanjutkan yaaa
?>
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

<div class="panel-body">
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/exporting.js"></script>        
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <script>
        $(function () {Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average'
    },
    subtitle: {
        text: 'Source: Pk. Elang Perkasa'
    },
    xAxis: {
        categories: [
        <?php foreach ($rows as $row):?>'<?=$BULAN[$row->bulan]?>',<?php endforeach;?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Penjualan',
        data: [<?php foreach ($rows as $row):?><?=$row->total?>,<?php endforeach;?>
        ],

    }]
});
        });
    </script>
</div>
</div>