<?php 
$this->load->view('admin/_header');
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
                    <a href="<?= base_url() ?>admin/Kategori">Kategoriler</a>
                    </li>
                    <li>
                    <a href="<?= base_url() ?>admin/Kategori/ekle">Kategori Ekle</a>
                    </li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Yeni Kategori Ekle
                </div>
                <div class="panel-body">
                    <form role="form" action="<?= base_url() ?>admin/Kategori/eklekaydet" method="post">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input name="ad" type="text" class="form-control" placeholder="kategori">
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