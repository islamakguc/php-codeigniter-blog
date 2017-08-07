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
        <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i> Anasayfa</a>
    </li>
    <li>
        <a href="<?= base_url() ?>admin/Kullanicilar"><i class="fa fa-user"></i> Kullanıcılar</a>
    </li> 
    <li>
        <a href="#"><i class="glyphicon glyphicon-font"></i> Yazı İşlemleri<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="<?= base_url() ?>admin/Yazilar">Tüm Yazılar</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/Yazilar/yazilarim">Yazılarım</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/Yazilar/taslakYazi">Taslak Yazılar</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
        <li>
            <a href="#"><i class="glyphicon glyphicon-folder-close"></i> Kategori İşlemleri<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?= base_url() ?>admin/Kategori">Yazı Kategori Listele</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Uye_Kategori">Üye Kategori Listele</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="<?= base_url() ?>admin/Mesaj"><i class="glyphicon glyphicon-envelope"></i> Mesajlar</a>
        </li> 
        <li>
            <a href="#"><i class="glyphicon glyphicon-comment"></i> Yorumlar<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?= base_url() ?>admin/Yorum/yorumlarim">Yorumlarım</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Yorum/onaybekleyen">Onay Bekleyen Yorumlar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Yorum/onay">Onaylı Yorumlar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Yorum">Tüm Yorumlar</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
    </li>
    <li>
        <a href="<?= base_url() ?>admin/Mail"><i class="glyphicon glyphicon-envelope"></i> Mailler</a>
    </li>   
    <li>
        <a href="<?= base_url() ?>admin/Sosyal"><i class="glyphicon glyphicon-globe"></i> Sosyal Medya</a>
    </li>
    <li>
        <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular"><i class="glyphicon glyphicon-question-sign"></i> S.S.S</a>
    </li>
    <li>
        <a href="<?= base_url() ?>admin/Ayarlar"><i class="fa fa-cog"></i> Site Ayarları</a>
    </li>

</ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>