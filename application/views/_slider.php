   <div class="row">

       <div class="header-content twelve columns">
        <br><br><br>
        <!-- Full Page Image Background Carousel Header -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <div class="carousel-inner">
             <?php
             $i=0;
             foreach ($veri as $rs) 
             {
                if($i==0)
                {
                    $clas='class="item active"';
                }
                else
                {
                    $clas='class="item"';
                }
                ?>
                <!-- Wrapper for Slides -->

                <div <?php echo $clas ?> >
                    <!-- Set the first background image using inline CSS below. -->
                    <a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id;?>"> <div class="fill" style="background-image:url('<?= base_url() ?>uploads/<?=$rs->resim;?>');"></div>
                        <div class="carousel-caption">
                            <h2><?=$rs->baslik;?></h2>
                        </div></a>
                    </div>
                    <?php 
                    $i++;
                }
                ?>
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