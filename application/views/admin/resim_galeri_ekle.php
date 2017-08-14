<?php 
$query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('admin/_header',$data1);
$this->load->view('admin/_sidebar');
?>
<!-- Page Content -->   
<link href="<?= base_url() ?>assets/css/resim.css" rel="stylesheet">

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
                    <a href="<?= base_url() ?>admin/Yazilar/">Yazılar</a>
                </li>
                 <li>
                    <a href="<?= base_url() ?>admin/Yazilar/resim_galeri_ekle/resim[0]->id<">Resim Ekle</a>
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
            Resim Galeri Ekle
        </div>
        <div class="panel-body"><br>
           <?php echo form_open_multipart(base_url().'admin/Yazilar/resim_galeri_upload/'.$resim[0]->id);?>
           <div class="form-group">
            <input type="file" name="userfile" required="" />                        
        </div><br>
        <div class="form-group input-group">
            <button type="submit" class="btn btn-default">Resim Ekle</button>
        </div>
    </div>
</div>
<div >
    <div class="panel-body"> <div>
        <section class="row">
            <?php 
            foreach ($data as $rs) {
                ?>

                <article class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="<?= base_url() ?>uploads/<?=$rs->ad?>"" title="Nature Portfolio" class="zoom" data-title="Amazing Nature" data-footer="The beauty of nature" data-type="image" data-toggle="lightbox">
                                <img src="<?= base_url() ?>uploads/<?=$rs->ad?>" alt="Nature Portfolio" />
                                <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="panel-footer">
                        <h4><a href="#" title="Nature Portfolio">İslam AKGÜÇ</a></h4>
                            <span class="pull-right">
                               <a href="<?= base_url() ?>admin/Yazilar/deletegaleri/<?=$rs->id?>/<?=$rs->yazi_id?>"> <i id="like1" class="fa fa-times"></i></a>
                            </span>
                        </div>
                    </div>
                </article>

                <?php }?>    
            </section>
        </div>
    </div>
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

