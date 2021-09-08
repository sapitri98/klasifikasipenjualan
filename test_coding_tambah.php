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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
    $nomor = $db->get_var("SELECT nomor FROM tb_dataset ORDER BY nomor DESC LIMIT 1") * 1 + 1;
?>
<div class="page-header">
    <h1>Tambah 
    </h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nomor <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nomor" value="<?= set_value('nomor', $nomor) ?>" />
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control" name="nama_brg" id="nama_brg">
                    <?php
                        $kon = mysqli_connect('localhost','root','','elang');

                        $sql = "SELECT id_barang, nama_barang FROM tb_barang";
                        $hasil = mysqli_query($kon,$sql);
                        while ($data = mysqli_fetch_array($hasil)){
                            ?>
                            <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['nama_barang'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Barang</label>
                <!-- <input class="form-control" type="" name="jenis_brg" id="jenis"> -->
                <select class="form-control" name="jenis_brg" id="jenis">
                    
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=dataset"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $("#nama_brg").change(function(){
        var id_barang = $("#nama_brg").val();
        console.log(id_barang);

        $.ajax({
           type : "POST",
           dataType: "html",
           url: "ajax_jenis.php",
           data: "nama_barang="+id_barang,
           success: function(data){
                console.log(data);
                $("#jenis").html(data);
           }

        });
    });
</script>