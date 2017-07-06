 <!-- Content
 ================================================== -->
 <div id="content-wrap">

    <div class="row">

        <div id="main" class="eight columns">
           <?php
           foreach ($veri as $rs) 
           {
             ?>
             <article class="entry">

                <header class="entry-header">

                    <h2 class="entry-title">
                        <a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id?>" title=""><?=$rs->baslik?></a>
                    </h2>                

                    <div class="entry-meta">
                        <ul>
                            <li><?php echo turkcetarih('j F Y , l',$rs->tarih); ?></li>
                            <span class="meta-sep">&bull;</span>                                
                            <li><a href="#" title="" rel="category tag"><?=$rs->katadi?></a></li>
                            <span class="meta-sep">&bull;</span>
                            <li><?=$rs->yazar_ad?></li>
                        </ul>
                    </div> 

                </header> 

                <div class="entry-content">
                    <p> 
                        <?php
                         if (strlen($rs->metin) > 500) {
                              $sonhali = substr($rs->metin, 0, 500); // "Tablo içinde göst"
                              $sonhali = $sonhali . '...';
                              echo $sonhali;
                            } 
                            else
                              echo $rs->metin; 
                        ?>
                    </p>
                </div> 

              </article> <!-- end entry -->        
              <?php 
          } 
          ?>
      </div> <!-- end main -->

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