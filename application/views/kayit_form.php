<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>İslam AKGÜÇ - Kullanıcı Girişi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url() ?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" >
                        <h3 class="panel-title">Kullanıcı Kayıt<div style="float: right;"> <a href="<?= base_url() ?>Login"> Kullanici Girişi</a></div></h3>
                    </div>

                    <div class="panel-body">
                        <form role="form" action="<?= base_url() ?>Login/kayit_ol" method="post">
                            <fieldset>
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
                            <button type="submit" class="btn btn-lg btn-success btn-block">Kayıt Ol</button>
                        </fieldset>
                    </form>
                    <br>
                    <?php 
                    if($this->session->flashdata("login_uyehata"))
                    {
                       ?>
                       <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>İşlem:</strong> <?=$this->session->flashdata("login_uyehata"); ?>
                    </div>
                    <?php
                } ?>

            </div>
        </div>
    </div>
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>assets/admin /dist/js/sb-admin-2.js"></script>

</body>

</html>
