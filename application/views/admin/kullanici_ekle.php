<?php 
$query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('admin/_header',$data1);
$this->load->view('admin/_sidebar');
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
                       <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i></a>
                   </li>
                   <li>
                    <a href="<?= base_url() ?>admin/Kullanicilar">Kullanıcılar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Kullanicilar/ekle">Kullanıcı Ekle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Yeni Kullanıcı Ekle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Kullanicilar/eklekaydet" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="ad" type="text" class="form-control" placeholder="Ad Soyad" required="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="sifre" type="password" class="form-control" placeholder="Şifre" required="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">@</span>
                        <input name="mail" type="email" class="form-control" placeholder="E-Mail" required="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <select name="yetki" class="form-control">
                            <?php foreach($kategori as $rows){ ?>
                            <option><?php echo $rows->kategoriadi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-default">Kaydet</button>
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
$this->load->view('admin/_footer');
?>