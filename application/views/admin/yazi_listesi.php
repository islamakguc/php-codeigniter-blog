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
                            <a href="<?= base_url() ?>admin/Yazilar">Yazılar</a>
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
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Yazar Adı</th>
                            <th>Durum</th>
                            <th>Kayıt Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     foreach ($veri as $rs) 
                     {
                         ?>
                         <tr class="odd gradeX">
                            <td><?=$rs->baslik?></td>  
                            <td><?=$rs->kategori_ad?></td>                              
                            <td><?=$rs->yazar_ad?></td>
                            <td class="center"><?php
                                if($rs->durum==1){
                                    echo "Yayında";
                                }else
                                {
                                    echo "Taslak";
                                }
                                ?></td>
                                <td class="center"><?=$rs->tarih?></td>
                                <td class="center"><div class="btn-group">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;İşlemler&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>admin/Kullanicilar/edit/<?=$rs->id?>">Düzenle</a></li>
                                        <li><a href="<?= base_url() ?>admin/Kullanicilar/delete/<?=$rs->id?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
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