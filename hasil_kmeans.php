<style type="text/css">
  .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
  }
 
  .table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
  }
 
  .table1, th, td {
    padding: 8px 20px;
    text-align: center;
  }
 
  .table1 tr:hover {
    background-color: #f5f5f5;
  }
 
  .table1 tr:nth-child(even) {
    background-color: #f2f2f2;
  }

</style>

<?php
$stop = false;
$centroid = array();
$groups = array();


function get_atribut($refresh = false)
{
    global $ATRIBUT, $db, $TARGET, $DICARI;
    // print_r($ATRIBUT);
    if (!$ATRIBUT || $refresh) {
        $rows = $db->get_results("SELECT * FROM tb_atribut ORDER BY id_atribut");
        foreach ($rows as $row) {
            $ATRIBUT[$row->id_atribut] = $row->nama_atribut;
        }

        end($ATRIBUT);
        $TARGET = key($ATRIBUT);
        reset($ATRIBUT);

        $DICARI = $ATRIBUT;
        unset($DICARI[$TARGET]);
    }
    return $ATRIBUT;
}
$JENIS = array(
    'M1'=>'Sangat Laris',
    'M2'=>'Cukup Laris',
    'M3'=>'Kurang Laris',
);


$rows = $db->get_results("SELECT nomor FROM tb_dataset WHERE id_nilai='7' GROUP BY nomor ORDER BY RAND() LIMIT 1 ");
$no = 1;
foreach($rows as $row){
    $centroid["M1"] = $row->nomor;
    $no++;
}
$rows = $db->get_results("SELECT nomor FROM tb_dataset WHERE id_nilai='6' GROUP BY nomor ORDER BY RAND() LIMIT 1 ");
foreach($rows as $row){
    $centroid["M2"] = $row->nomor;
    $no++;
}
$rows = $db->get_results("SELECT nomor FROM tb_dataset WHERE id_nilai='5' GROUP BY nomor ORDER BY RAND() LIMIT 1 ");
$no = 1;
foreach($rows as $row){
    $centroid["M3"] = $row->nomor;
    $no++;
}

// print_r($centroid);
$rows = $db->get_results("SELECT * FROM tb_dataset GROUP BY nomor");
foreach ($rows as $row) {
 $ALTERNATIF[$row->nomor]= $row->ket_dataset;
}

foreach ($rows as $row) {
 $ALTERNATIF_2[$row->nomor]= $row->ket_dataset;
}

$KRITERIA = get_atribut();
// print_r($KRITERIA);

$rowsdata = $db->get_results("SELECT * FROM tb_dataset st INNER JOIN tb_nilai n ON n.id_atribut = st.id_atribut");
            foreach ($rowsdata as $rb) {
              $CALLSET[$rb->ket_dataset] = $rb->nama_nilai;
            }

function get_pusat_centroid($centroid = array(), $data = array()){
    $arr = array();
    foreach($centroid as $key => $val){
        $arr[$key] = $data[$val];
    }
    return $arr;
}

function get_jarak($row_data, $row_pusat_centroid){
    $result = 0;
    foreach($row_data as $key => $val){
        $result += pow($val - $row_pusat_centroid[$key], 2);
    }
    return sqrt($result);
}

function get_jarak_centroid($pusat_centroid = array(), $data = array()){
    $arr = array();

    foreach($data as $key => $val){
        foreach($pusat_centroid as $k => $v){
            $arr[$key][$k] = get_jarak($data[$key], $pusat_centroid[$k]);
        }
    }
    return $arr;
}

function get_keanggotaan($jarak_centroid = array()){
    $arr = array();
    foreach($jarak_centroid as $key => $val){
        $arr_min = array_keys($val, min($val));  
        if(count($arr_min)>1)      
            $arr_min = array_reverse($arr_min);
        $arr[$key] = $arr_min[0];
    }
    return $arr;
}


function get_pusat_centroid_baru($data, $keanggotaan){
    $arr = array();
    foreach($data as $key => $val){
        foreach($val as $k => $v){
            $arr[$keanggotaan[$key]][$k][]= $v;    
        }        
    }
    $pembagi = count($data);
    $result = array();
    foreach($arr as $key => $val){
        foreach($val as $k => $v){
            $result[$key][$k] = array_sum($v) / count($v);    
        }
    }
    return $result;
}
// print_r($data);
$pusat_centroid = get_pusat_centroid($centroid, $data); 
// print_r($pusat_centroid);
?>
<div id="hasil" class="panel panel-default">
    <div class="panel-heading">Hasil Perhitungan</div>
    <div class="panel-body">        
        <p>
            <button class="btn btn-primary" data-toggle="collapse" href="#perhitungan"><span class="glyphicon glyphicon-search"></span> Perhitungan</button>
        </p>
        <div id="perhitungan" class="collapse">                        
            <?php               
            $iterasi = 1;
            while(!$stop && $iterasi <= $maksimum):        
                $jarak_centroid = get_jarak_centroid($pusat_centroid, $data);     
                $keanggotaan = get_keanggotaan($jarak_centroid);                                                                                                             
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iterasi <?=$iterasi?></h3>
                    </div>
                    <div class="panel-body">Pusat centroid</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead><tr>
                                <th>Nama</th>
                                <?php                         
                                foreach($KRITERIA as $key):if($key->id_atribut!=$TARGET):?>
                                    <th><?=$key->nama_atribut?></th>
                                <?php endif;?>
                            <?php endforeach?>
                        </tr></thead>
                        <?php foreach($pusat_centroid as $key => $val):?>
                            <tr>
                                <td><?=$key?></td>                            
                                <?php foreach($val as $k => $v):?>
                                    <td><?=round($v, 4)?></td>
                                <?php endforeach?>
                            </tr>
                        <?php endforeach?>
                    </table>
                </div>
                <div class="panel-body">Jarak Terhadap Pusat centroid</div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead><tr>
                            <th>Nama</th>
                            <?php                         
                            foreach($KRITERIA as $key):if($key->id_atribut!=$TARGET):?>
                                <th><?=$key->nama_atribut?></th>
                                <?php endif;?>
                            <?php endforeach?>
                            <?php foreach($pusat_centroid as $key => $val):?>
                                <th><?=$key?></th>
                            <?php endforeach?>
                            <th>Group</th>
                        </tr></thead>
                        <?php foreach($jarak_centroid as $key => $val):?>
                            <tr>
                                <td><?=$ALTERNATIF[$key]?></td>
                                <?php foreach($data[$key] as $k => $v):?>
                                    <td><?=$v?></td>
                                <?php endforeach?>
                                <?php foreach($val as $k => $v):?>
                                    <td><?=round($v, 4)?></td>
                                <?php endforeach?>
                                <td><?=$keanggotaan[$key]?></td>
                            </tr>                    
                        <?php endforeach?>
                    </table>
                </div>
                
                <div class="panel-body">
                    <?php
                    if($iterasi==$maksimum && $groups != $keanggotaan){
                        $stop = true;
                        $ket = "Karena iterasi ($iterasi) sudah mencapai maksimum iterasi, maka iterasi dihentikan.";
                    } else if($groups == $keanggotaan){
                        $stop = true; 
                        $ket = "Karena group baru (".implode(',', $keanggotaan).") = group sebelumnya (".implode(',', $groups)."), maka iterasi dihentikan.";   
                    } else {
                        $iterasi++;
                        $ket = "Karena group baru (".implode(',', $keanggotaan).") <> group sebelumnya (".implode(',', $groups)."), maka iterasi dilanjutkan.";                    
                        $pusat_centroid = get_pusat_centroid_baru($data, $keanggotaan);                    
                        $groups = $keanggotaan;
                    }                                    
                    ?>
                    <?=$ket?>
                </div>
            </div>
        <?php endwhile;
        $arr = array();
        foreach($keanggotaan as $key => $val){
            $arr[$val]++;
        }
$ATT['M1'] = 'Sangat Laris';
$ATT['M2'] = 'Cukup Laris';
$ATT['M3'] = 'Kurang Laris';

    $_SESSION['keanggotaan']=$keanggotaan;
    $_SESSION['callset']=$CALLSET;

        $chart = array();
        foreach($arr as $key => $val){
            $chart[] = array(
                'name' => $ATT[$key],
                'y' => $val,
            );
        }   
        $_SESSION['chart']=$chart;             
        ?>                
    </div>                                       
</div>

<div class="table-responsive">

    <table class="table1">    
        <thead><tr>
            <td>Kode</td>
            <td>Nama</td>
            <td>centroid</td>
            <!-- <td>Real Label</td> -->
        </tr></thead>                
        <?php 
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
    <br>
     <a href="cetak.php?m=hasil_kmeans" class="btn btn-warning" target="_blank">Cetak</a>

</div>
<br>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Akurasi!</h4>
  <p>Jumlah Benar : <?=$benar?> dengan akurasi <?=$benar/count($ALTERNATIF)*100?> %</p>
</div>
<div class="panel-body">
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/exporting.js"></script>        
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <script>
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
    </script>
</div>
</div>
