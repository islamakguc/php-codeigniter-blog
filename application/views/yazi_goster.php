   <!-- Content
   ================================================== -->
   <link href="<?= base_url() ?>assets/css/resim.css" rel="stylesheet">
   <div id="content-wrap">
    <br><br>  <br>
    <div class="row">

     <div id="main" class="eight columns">

      <article class="entry">

       <header class="entry-header">
         <h4 class="entry-title">
           <?=$veri[0]->baslik?>
         </h4>				 

         <div class="entry-meta">
          <ul>
            <li>Yayınlanma Tarihi: <?php echo turkcetarih('j F Y , l',$veri[0]->tarih); ?></li>
            <span class="meta-sep">&bull;</span>    
            <?php $kategori=$this->Database_Model->get_data_id("kategori",$veri[0]->kategori_id);?>  
            <?php $yazar=$this->Database_Model->get_data_id("kullanicilar",$veri[0]->yazar_id);?>                         
            <li><a href="<?= base_url() ?>Home/kategori/<?=$kategori[0]->kategoriadi?>" title=""><?=$veri[0]->katadi?></a></li>
            <span class="meta-sep">&bull;</span>
            <li><a href="<?= base_url() ?>Home/yazar/<?=$yazar[0]->link?>" title=""><?=$veri[0]->yazar_ad?></a></li>
          </ul>
        </div> 

      </header> 

      <div class="entry-content-media">
        <div class="post-thumb">
         <img src="<?= base_url() ?>uploads/<?=$veri[0]->resim?>">
       </div> 
     </div>

     <div class="entry-content">
      <p class="lead"><?=$veri[0]->metin?></p>
    </div>

    <?php

    $metin=$veri[0]->keywords;

    $dizi = explode (",",$metin);
    ?>
    <p class="tags">
     <span>Etiketler </span>:

     <?php 
     $a=0;
     foreach( $dizi as $i)
     {
      $a++;
      ?>
      <a href="<?= base_url() ?>Home/etiket/<?=$i?>">#<?=$i." "?></a>

      <?php if (count($dizi)>$a){
        echo ",";
      }
    }

    ?>
  </p> <br>
  <h3>Yazı ile ilgili görseller</h3>
  <section class="row">
    <?php 
    foreach ($data as $rs) {
      ?>

      <article class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <a href="<?= base_url() ?>uploads/<?=$rs->ad?>"" title="" class="zoom" data-title="Amazing Nature" data-footer="The beauty of nature" data-type="image" data-toggle="lightbox">
              <img src="<?= base_url() ?>uploads/<?=$rs->ad?>"" alt="Nature Portfolio" />
              <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
            </a>
          </div>
         <!-- <div class="panel-footer">
            <h4><a href="#" title="Nature Portfolio">Nature</a></h4>
            <span class="pull-right">
              <i id="like1" class="glyphicon glyphicon-thumbs-up"></i> <div id="like1-bs3"></div>
              <i id="dislike1" class="glyphicon glyphicon-thumbs-down"></i> <div id="dislike1-bs3"></div>
            </span>
          </div>-->
        </div>
      </article>

      <?php }?>    
    </section>
  </article>

				<!-- Comments
        ================================================== -->
        <div id="comments">
          <h3><?php echo count($yorum); ?> Yorum Yapılmış</h3>
          <!-- commentlist -->
          <ol class="commentlist">
            <?php
            foreach ($yorum as $rs) 
            {
             ?>

             <li class="depth-1">

               <div class="avatar">
                <img width="50" height="50" class="avatar" src="<?= base_url() ?>assets/images/user-01.png" alt="">
              </div>

              <div class="comment-content">

                <div class="comment-info">
                 <cite><?=$rs->yazar_ad?></cite>

                 <div class="comment-meta">
                  <time class="comment-time" ><?php echo turkcetarih('j F Y , l',$rs->ktarih); ?></time>
                </div>
              </div>

              <div class="comment-text">
               <p><?=$rs->yorum?></p>
             </div>

           </div>

         </li>
         <?php 
       } 
       ?>

     </ol> <!-- Commentlist End -->

     <!-- respond -->
     <div class="respond">


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
    <!-- form -->
    <?php 
    if($this -> session -> userdata('oturum_data'))
    {
      if($ayar[0]->yorum==1)
      {
        $durum="";
        $aciklama="";
        ?>
        <h3>Yorum Yap!</h3>
        <form name="contactForm" id="contactForm" method="post" action="<?= base_url() ?>Home/yorumekle/<?=$veri[0]->id?>">
          <fieldset>

            <div class="message group">
              <label  for="cMessage">Yorum <span class="required">*</span></label>
              <textarea name="yorum" <?=$durum?> required="required"  id="cMessage" rows="10" cols="50" ></textarea>
            </div>

            <button type="submit"<?=$durum?>  class="submit">Yorum Yap</button>

          </fieldset>
        </form> <!-- Form End -->
        <?php 
      }
      else
      {
        $durum="disabled";
        echo "Sistem Yorum Yapmaya Kapalı Lütfen Yönetici ile İletişime geçiniz!";
      }
    }
    else
    {
      $durum="disabled";
      echo "Yorum Yapabilmek için ";?><a href="<?= base_url() ?>Login/kayit" target="_blank" >Üye</a>/<a href="<?= base_url() ?>Login" target="_blank">Giriş</a><?php echo" yapınız"       ;
    }
    ?>
  </div> <!-- Respond End -->

</div>  <!-- Comments End -->		


</div> <!-- main End -->

<?php 

function turkcetarih($f, $zt = 'now'){
  $z = date("$f", strtotime($zt));
  $donustur = array(
    'Monday'    => 'Pazartesi',
    'Tuesday'   => 'Salı',
    'Wednesday' => 'Çarşamba',
    'Thursday'  => 'Perşembe',
    'Friday'    => 'Cuma',
    'Saturday'  => 'Cumartesi',
    'Sunday'    => 'Pazar',
    'January'   => 'Ocak',
    'February'  => 'Şubat',
    'March'     => 'Mart',
    'April'     => 'Nisan',
    'May'       => 'Mayıs',
    'June'      => 'Haziran',
    'July'      => 'Temmuz',
    'August'    => 'Ağustos',
    'September' => 'Eylül',
    'October'   => 'Ekim',
    'November'  => 'Kasım',
    'December'  => 'Aralık',
    'Mon'       => 'Pts',
    'Tue'       => 'Sal',
    'Wed'       => 'Çar',
    'Thu'       => 'Per',
    'Fri'       => 'Cum',
    'Sat'       => 'Cts',
    'Sun'       => 'Paz',
    'Jan'       => 'Oca',
    'Feb'       => 'Şub',
    'Mar'       => 'Mar',
    'Apr'       => 'Nis',
    'Jun'       => 'Haz',
    'Jul'       => 'Tem',
    'Aug'       => 'Ağu',
    'Sep'       => 'Eyl',
    'Oct'       => 'Eki',
    'Nov'       => 'Kas',
    'Dec'       => 'Ara',
    );
  foreach($donustur as $en => $tr){
    $z = str_replace($en, $tr, $z);
  }
  if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
  return $z;
}
?>