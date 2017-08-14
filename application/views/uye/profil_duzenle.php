<?php $query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('uye/_header',$data1);
$this->load->view('uye/_sidebar');
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
               <br>
               <div>
                <ul class="breadcrumb">
                    <li>
                       <a href="<?= base_url() ?>uye/Home"><i class="glyphicon glyphicon-home"></i></a>
                   </li>
                   <li>
                   <a href="<?= base_url() ?>uye/Profil/profiledit/">Profil</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Profil  Düzenle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>uye/Profil/profilguncelle/<?=$veri[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="ad" type="text" value="<?=$veri[0]->ad?>" class="form-control" placeholder="Ad Soyad">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">@</span>
                        <input name="mail" type="email" value="<?=$veri[0]->mail?>" class="form-control" placeholder="E-Mail">
                    </div>
                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-default">Güncelle</button>
                    </div>
                </form>
            </div>
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
<?php 
$this->load->view('uye/_footer');
?>