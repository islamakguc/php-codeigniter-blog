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
                            <a href="<?= base_url() ?>admin/Kullanicilar">Kullanıcılar</a>
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
                    Kullanıcılar Tablosu<span style="display:inline; float:right;"><a href="<?=base_url()?>admin/Kullanicilar/ekle" class="btn btn-primary btn-xs" role="button">Yeni Kullanıcı Ekle</a></span>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                         <tr>
                            <th>İsim Soyisim</th>
                            <th>E-Mail</th>
                            <th>Yetki</th>
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
                            <td><a href="<?= base_url() ?>admin/kullanicilar/goster/<?=$rs->id?>"><?=$rs->ad?></a></td>
                            <td><?=$rs->mail?></td>
                            <td><?=$rs->yetki?></td>
                            <td class="center"><?php
                                if($rs->durum==1){
                                    echo "aktif";
                                }else
                                {
                                    echo "pasif";
                                }
                                ?></td>
                                <td class="center"><?=$rs->ktarih?></td>
                                <td class="center"><div class="btn-group">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;İşlemler&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>admin/Kullanicilar/goster/<?=$rs->id?>">İncele</a></li>
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