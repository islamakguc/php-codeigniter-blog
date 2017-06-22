       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <br>
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= base_url() ?>admin/Home">Anasayfa</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/Kategori">kategoriler</a>
                        </li>
                    </ul>
                </div>
                <?php 
                if($this->session->flashdata("sonuc"))
                {
                   ?>
                   <div class="alert alert-success">
                    <strong>İşlem:</strong> <?=$this->session->flashdata("sonuc"); ?>
                </div>
                <?php
            } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kullanıcılar Tablosu
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                           <tr>
                            <th>Kategori Adı</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       foreach ($veri as $rs) 
                       {
                           ?>
                           <tr class="odd gradeX">
                           <td><?=$rs->kategoriadi?></td>
                            <td class="center"><div class="btn-group">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;İşlemler&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>admin/Kategori/edit/<?=$rs->id?>">Düzenle</a></li>
                                    <li><a href="<?= base_url() ?>admin/Kategori/delete/<?=$rs->id?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
                                </ul>
                            </div></td>
                        </tr>
                        <?php 
                    } 
                    ?>
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->