<?php

session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    include "404.html";
} else {
    $aksi = "modul/produk/aksi_pengumuman.php";
    switch ($_GET['aksi']) {
        default:
?>
            <h3><i class="fa fa-angle-right"></i> Tabel Pengumuman</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Data Pengumuman</h4>
                        <div class="col-sm-12" align='right'>
                            <a href=<?php echo "?p=pengumuman&aksi=tambah"; ?>><button type="button" class="btn btn-info">Tambah Data</a></button>
                        </div>
                        <section id="unseen">

                            < <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conn, "Select * from pengumuman order by nama asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr><td>$r[id_pengumuman]</td>
                                                  <td>$r[judul]</td>
                                                  <td>$r[deskripsi]</td>
                                                  <td>$r[tanggal_upload]</td>
                                                  <td>
                                                  <a href='$aksi?act=hapus&id=$r[id_pengumuman]'<button type='button' class='btn btn-danger'>Delete</button>
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
            <h3><i class="fa fa-angle-right"></i> Form Pengumuman</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Pengumuman</h4>
                        <form class="form-horizontal style-form" method="POST" action=<?php echo "modul/produk/aksi_pengumuman.php?act=tambah"; ?> enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="deskripsi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Upload</label>
                                <div class="col-md-3 col-xs-11">
                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-01-2014" class="input-append date dpYears">
                                        <input name="tanggal_lahir" type="text" readonly="" value="01-01-2014" size="16" class="form-control">
                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                    <span class="help-block">Select date</span>
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