<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <fieldset disabled="">
             <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
        </fieldset>

        <li>
            <a href="<?= base_url() ?>uye/Home"><i class="glyphicon glyphicon-home"></i> Anasayfa</a>
        </li>
        <li>
            <a href="#"><i class="glyphicon glyphicon-font"></i> Yazı İşlemleri<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?= base_url() ?>uye/Yazilar">Yazı Listele</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>uye/Yazilar/ekle">Yazı Ekle</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->

        </li>
         <li>
            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Mesajlar<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?= base_url() ?>uye/Mesaj">Gelen Mesajlar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>uye/Mesaj/mesajgonder">Mesaj Gönder</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->

        </li>
        <li>
        <a href="<?= base_url() ?>uye/Yorum"><i class="glyphicon glyphicon-comment"></i> Yorumlarım</a>
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>