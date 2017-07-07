   <!-- Content
   ================================================== -->
   <div id="content-wrap">
<br><br>
   	<div class="row">

   		<div id="main" class="eight columns">

   			<article class="entry">

           <header class="entry-header">
             <h2 class="entry-title">
              <a href="#" title=""><?=$veri[0]->baslik?></a>
            </h2>				 

            <div class="entry-meta">
              <ul>
                <li>Yayınlanma Tarihi: <?php echo turkcetarih('j F Y , l',$veri[0]->tarih); ?></li>
                <span class="meta-sep">&bull;</span>                                
                <li><a href="#" title="" rel="category tag"><?=$veri[0]->katadi?></a></li>
                <span class="meta-sep">&bull;</span>
                <li><?=$veri[0]->yazar_ad?></li>
              </ul>
            </div> 

          </header> 

          <div class="entry-content-media">
            <div class="post-thumb">
             <img src="<?= base_url() ?>assets/images/m-farmerboy.jpg">
           </div> 
         </div>

         <div class="entry-content">
          <p class="lead"><?=$veri[0]->metin?></p>
        </div>
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

      <h3>Yorum Yap!</h3>

      <!-- form -->
      <form name="contactForm" id="contactForm" method="post" action="">
        <fieldset>

         <div class="group">
          <label for="cName">Name <span class="required">*</span></label>
          <input name="cName" type="text" required="required" id="cName" size="35" value="" />
        </div>

        <div class="group">
          <label for="cEmail">Email <span class="required">*</span></label>
          <input name="cEmail" type="text" required="required" id="cEmail" size="35" value="" />
        </div>

        <div class="message group">
          <label  for="cMessage">Message <span class="required">*</span></label>
          <textarea name="cMessage" required="required"  id="cMessage" rows="10" cols="50" ></textarea>
        </div>

        <button type="submit" class="submit">Submit</button>

      </fieldset>
    </form> <!-- Form End -->

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