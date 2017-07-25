
   <!-- Header
   ================================================== -->

   <div class="row">

     <div class="header-content twelve columns">
        <br><br><br>
        <!-- Full Page Image Background Carousel Header -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <div class="carousel-inner">
            <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <a href=""><div class="fill" style="background-image:url('<?= base_url() ?>assets/images/m-farmerboy.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>ssdfsdfsd</h2>
                    </div></a>
                </div>
            <?php
            foreach ($veri as $rs) 
            {
               ?>
               <!-- Wrapper for Slides -->

                <div class="item">
                    <!-- Set the first background image using inline CSS below. -->
                   <a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id;?>"> <div class="fill" style="background-image:url('<?= base_url() ?>uploads/<?=$rs->resim;?>');"></div>
                    <div class="carousel-caption">
                        <h2><?=$rs->baslik;?></h2>
                    </div></a>
                </div>
                <?php } ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </header>

    </div>     

</div>