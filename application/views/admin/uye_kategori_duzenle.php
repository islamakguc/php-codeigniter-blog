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
                    <a href="<?= base_url() ?>admin/Uye_Kategori/">Üye Kategoriler</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Uye_Kategori/edit/<?=$veri[0]->id?>">Kategori Düzenle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Üye Kategori Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Uye_Kategori/guncellekaydet/<?=$veri[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="ad" type="text" required="" value="<?php echo $veri[0]->kategoriadi;?>" class="form-control" placeholder="Kategori">
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
$this->load->view('admin/_footer');
?>