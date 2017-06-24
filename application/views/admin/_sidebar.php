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
            <?php 
            if($this -> session -> oturum_data['yetki'] == "Admin")
            {
             ?>
             <li>
                <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i> Anasayfa</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> Kullanıcı İşlemleri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Kullanicilar">Kullanıcıları Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Kullanicilar/ekle">Kullanıcı Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-font"></i> Yazı İşlemleri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Yazilar">Yazı Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Yazilar/ekle">Yazı Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-folder-close"></i> Kategori İşlemleri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Kategori">Kategori Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Kategori/ekle">Kategori Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-question-sign"></i>  S.S.S<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular">S.S.S Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular/ekle">S.S.S Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?= base_url() ?>admin/Yorum"><i class="fa fa-comments-o"></i> Yorumlar</a>
            </li>
             <li>
                <a href="<?= base_url() ?>admin/Ayarlar"><i class="fa fa-cog"></i> Site Ayarları</a>
            </li>
            <?php 
        }
        else
        {
            ?>
            <li>
                <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i> Anasayfa</a>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-font"></i> Yazı İşlemleri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Yazilar">Yazı Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Yazilar/ekle">Yazı Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-question-sign"></i>  S.S.S<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular">S.S.S Listele</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular/ekle">S.S.S Ekle</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?= base_url() ?>admin/Yorum"><i class="fa fa-comments-o"></i> Yorumlar</a>
            </li>

            <?php 
        }

        ?>


    </ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>