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
<style>    
    .text-primary{font-weight: bold;}


</style>
<div class="page-header">
    <h1>Perhitungan</h1>
</div>
<?php
function get_data(){
    global $db,$TARGET;
    $rows = $db->get_results("SELECT *
        FROM tb_dataset ds INNER JOIN tb_atribut at on ds.id_atribut = at.id_atribut ORDER BY nomor,ds.id_atribut ASC");
    $data = array();
    foreach($rows as $row){
        // print_r($TARGET);
        if ($row->id_atribut!=$TARGET) {
            if(!empty($ATRIBUT_NILAI[$row->id_atribut]))
            {
                $data[$row->nomor][$row->id_atribut] = $row->bobot;
            }else{
                $data[$row->nomor][$row->id_atribut] = $row->id_nilai;
            }
        }
    }
    return $data;
}

$rows = $db->get_results("SELECT *
    FROM tb_dataset d 
    INNER JOIN tb_atribut a ON a.id_atribut=d.id_atribut                 
    WHERE a.nama_atribut LIKE '%$q%'
    ORDER BY d.nomor, a.id_atribut");

$dataset = array();
foreach ($rows as $row) {
    // print_r($rows);
    if ($row->id_atribut!=$TARGET) {
        if(!empty($ATRIBUT_NILAI[$row->id_atribut]))
        {
           $dataset[$row->nomor][$row->id_atribut]['nama_nilai'] = $NILAI[$row->id_nilai]->nama_nilai;
       }else{
           $dataset[$row->nomor][$row->id_atribut]['nama_nilai'] = $row->id_nilai;
       }

        # code...
   }

}

// print_r($dataset);
$data = get_data();?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Hasil Analisa</strong></div>
    <div class="table-responsive"> 
        <table class="table1">
            <thead>
                <tr class="nw">
                    <th>Nomor</th>
                    <?php foreach ($ATRIBUT as $key) :
                        if($key->id_atribut!=$TARGET):?>
                            <th><?= $key->nama_atribut ?></th>
                        <?php endif;?>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php

            foreach ($dataset as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v['nama_nilai'] ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pengaturan</h3>
    </div>
    <div class="panel-body">
        <?php
        $succes = false;
        if($_POST){
            $jumlah = $_POST['jumlah'];
            $maksimum = $_POST['maksimum'];    
            if($jumlah < 2 || $maksimum < 10){
                print_msg('Masukkan minimal 2 clustering, dan 10 iterasi');
            } else {
                $succes = true;
            }
        }
        ?>
        <form method="post" action="?m=hitung_kmeans#hasil_kmeans">
            <div class="form-group">
                <label>Jumlah Cluster Dicari <span class="text-danger">*</span></label>
                <input class="form-control aw" type="hidden" name="jumlah" value="<?=set_value('jumlah', 3)?>" />
            </div>
            <div class="form-group">
                <label>Maksimum Iterasi <span class="text-danger">*</span></label>
                <input class="form-control aw" type="text" name="maksimum" value="<?=set_value('maksimum', 100)?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span>Proses</button>
            </div>
        </form>
    </div>
</div>        
<?php     
if($succes)
    include 'hasil_kmeans.php';
?>          

