<?php

session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    include "404.html";
} else {
    $aksi = "modul/produk/aksi_penghuni.php";
    switch ($_GET['aksi']) {
        default:
?>
            <h3><i class="fa fa-angle-right"></i> Tabel Penghuni</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Data Penghuni</h4>
                        <div class="col-sm-12" align='right'>
                            <a href=<?php echo "?p=penghuni&aksi=tambah"; ?>><button type="button" class="btn btn-info">Tambah Data</a></button>
                        </div>
                        <section id="unseen">

                            < <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>No. Hp</th>
                                        <th>Nama Orangtua</th>
                                        <th>Alamat Orangtua</th>
                                        <th>No.Hp Orangtua</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conn, "Select * from penghuni order by nama asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr><td>$r[id_penghuni]</td>
                                                  <td>$r[nama]</td>
                                                  <td>$r[nim]</td>
                                                  <td>$r[tanggal_lahir]</td>
                                                  <td>$r[alamat]</td>
                                                  <td>$r[no_hp]</td>
                                                  <td>$r[nama_orangtua]</td>
                                                  <td>$r[alamat_orangtua]</td>
                                                  <td>$r[no_hp_orangtua]</td>
                                                  <td>
                                                  <a href='$aksi?act=hapus&id=$r[id_penghuni]'<button type='button' class='btn btn-danger'>Delete</button>
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
            <h3><i class="fa fa-angle-right"></i> Form Penghuni</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Penghuni</h4>
                        <form class="form-horizontal style-form" method="POST" action=<?php echo "modul/produk/aksi_penghuni.php?act=tambah"; ?> enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
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
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select name="jurusan" class="form-control">
                                        <?php
                                        $sql = mysqli_query($conn, "Select * from jurusan order by nama_jurusan");
                                        while ($r = mysqli_fetch_array($sql)) {
                                            echo "<option value=$r[id_jurusan]>$r[nama_jurusan]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">No.Hp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_hp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Orangtua</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="nama_orangtua"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Alamat Orangtua</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_orangtua"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">No.Hp Orangtua</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="no_hp_orangtua"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Foto</label>
                                <div class="controls col-sm-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <span class="btn btn-theme02 btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" name="file" class="default" />
                                        </span>
                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                        <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                    </div>
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