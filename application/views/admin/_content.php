       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row"><br>
               <!-- /.col-lg-12 --><?php 
               if($this->session->flashdata("sonuc"))
               {
                   ?>
                   <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>İşlem:</strong> <?=$this->session->flashdata("sonuc"); ?>
                </div>
                <?php
            } ?>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-font fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($yazi)?></div>
                                <div>Yazılar </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>admin/Yazilar/yazilarim">
                        <div class="panel-footer">
                            <span class="pull-left">Detaylar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($yorum)?></div>
                                <div>Yorumlar </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>admin/Yorum">
                        <div class="panel-footer">
                            <span class="pull-left">Detaylar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($mesaj)?></div>
                                <div>Mesajlar</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>admin/Mesaj">
                        <div class="panel-footer">
                            <span class="pull-left">Detaylar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- /.row -->

            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        İşlemler
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#home-pills" data-toggle="tab">Duyuru</a>
                            </li>
                            <li><a href="#profile-pills" data-toggle="tab">Şifre değiştir</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home-pills">
                             <br><?php
                             foreach ($duyuru as $rs) 
                             {
                                 ?>
                                 <h4><i class="fa fa-bullhorn">
                                    <a href="" data-toggle="modal" data-target="#myModal"><?=$rs->baslik;?>  -  <?=$rs->tarih;?></a>
                                </i></h4>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                <br>
                                <p>
                                 <form role="form" action="<?= base_url() ?>admin/Login/password" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input name="eski" type="password" class="form-control" placeholder="Eski Şifre" required="">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input name="yeni" type="password" class="form-control" placeholder="Yeni Şifre" required="">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input name="yenitekrar" type="password" class="form-control" placeholder="Yeni Şifre Tekrar" required="">
                                    </div>
                                    <div class="form-group input-group">
                                        <button type="submit" class="btn btn-default">Değiştir</button>
                                    </div>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li id="mainPagePanelHeaderBG1" class="list-group-item text-muted Success">
                    <div class="panel-default">
                        Kullanıcı Bilgileri
                    </div>
                </li>
                <li class="list-group-item text-right"><span class="pull-left">
                    <i class="fa fa-user" title="Adı Soyadı"></i></span>
                    <label><?=$kisi[0]->ad;?></label>
                </li>
                <li class="list-group-item text-right"><span class="pull-left">
                    <i class="fa fa-envelope" title="Bağlı olduğu birim"></i></span>
                    <label><?=$kisi[0]->mail;?></label>
                </li>
                <li class="list-group-item text-right"><span class="pull-left">
                    <i class="fa fa-bookmark" title="Sicil No veya Öğrenci No"></i></span>
                    <label><?=$kisi[0]->yetki;?></label>
                </li>
                <li class="list-group-item text-right"><span class="pull-left">
                    <i class="fa fa-check-circle" title="Danışman Hoca"></i></span>
                    <label><?php 
                    if($kisi[0]->durum==1){
                            echo "Aktif";
                        }else
                        {
                            echo "Pasif";
                        }
                        ?></label>
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left">
                        <i class="glyphicon glyphicon-time" title="Tez durumu"></i></span>
                        <label><?=$kisi[0]->ktarih;?></label>
                    </li>

                </ul>
            </div>
            <div class="col-lg-6">
              <!-- /.panel-heading -->
              <div class="panel-body">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Duyuru Gönrüntüle</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                foreach ($duyuru as $rs) 
                                {
                                   echo $rs->duyuru;
                               } 
                               ?>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
</div>
</div>
    <!-- /#wrapper -->