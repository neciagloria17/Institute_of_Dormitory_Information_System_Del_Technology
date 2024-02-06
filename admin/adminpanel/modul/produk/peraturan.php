<?php

session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    include "404.html";
} else {
    $aksi = "modul/produk/aksi_peraturan.php";
    switch ($_GET['aksi']) {
        default:
?>
            <h3><i class="fa fa-angle-right"></i> Tabel Peraturan</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Data Peraturan</h4>
                        <div class="col-sm-12" align='right'>
                            <a href=<?php echo "?p=peraturan&aksi=tambah"; ?>><button type="button" class="btn btn-info">Tambah Data</a></button>
                        </div>
                        <section id="unseen">

                            < <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peraturan</th>
                                        <th>Tingkat</th>
                                        <th>Bentuk Pelanggaran</th>
                                        <th>Point Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conn, "Select * from peraturan order by nama asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr><td>$r[id]</td>
                                                  <td>$r[nama_peraturan]</td>
                                                  <td>$r[tingkat]</td>
                                                  <td>$r[bentuk_pelanggaran]</td>
                                                  <td>$r[poin]</td>
                                                  <td>
                                                  <<a href='$aksi?act=edit&id=$r[id]'<button type='button' class='btn btn-warning'>Edit</button>
                                                  <a href='$aksi?act=hapus&id=$r[id]' <button type='button' class='btn btn-danger'>Delete</button>
                                                  </td>
                                                  ";
                                        $no++;
                                    }


                                    ?>

                                </tbody>
                                </table>
                        </section>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-lg-4 -->
            </div>


        <?php
            break;
        case 'tambah':
        ?>
            <h3><i class="fa fa-angle-right"></i> Form Peraturan</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Tambah Peraturan</h4>
                        <form class="form-horizontal style-form" method="POST" action=<?php echo "modul/produk/aksi_peraturan.php?act=tambah"; ?> enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Peraturan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_peraturan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tingkat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tingkat">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Bentuk Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bentuk_pelanggaran">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Point Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="poin">
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="simpan"></input>
                </div>
            </div>
            </form>
            </div>
            </div>
            </div>
<?php
            break;
        case 'edit':
            break;
    }
}
?>