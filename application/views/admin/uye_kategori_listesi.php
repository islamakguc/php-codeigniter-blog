       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <br>
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/Uye_Kategori">Üye Kategoriler</a>
                        </li>
                    </ul>
                </div>
                <?php 
                if($this->session->flashdata("sonuc"))
                {
                 ?>
                 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>İşlem:</strong> <?=$this->session->flashdata("sonuc"); ?>
                </div>
                <?php
            } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kategoriler
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                         <tr>
                            <th style="text-align: center;">Kategori Adı</th>
                            <th style="text-align: center;">İşlemler </th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     foreach ($veri as $rs) 
                     {
                         ?>
                         <tr class="odd gradeX">
                             <td style="text-align: center;"><?=$rs->kategoriadi?></td>
                             <td style="text-align: center;"><div class="btn-group">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;İşlemler&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>admin/Uye_Kategori/edit/<?=$rs->id?>">Düzenle</a></li>
                                    <li><a href="<?= base_url() ?>admin/Uye_Kategori/delete/<?=$rs->id?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
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