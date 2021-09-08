<?php
    $kon = mysqli_connect('localhost','root','','elang');

    $id = $_POST['nama_barang'];

    $sql = "SELECT id_barang, jenis_barang FROM tb_barang where id_barang = '$id'";
                            $hasil = mysqli_query($kon,$sql);
                            while ($data = mysqli_fetch_array($hasil)){
                                ?>
                                <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['jenis_barang'] ?></option>
                        <?php
                            }
                        ?>