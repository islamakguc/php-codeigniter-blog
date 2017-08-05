 <!-- Content
 ================================================== -->
 <div id="content-wrap">
    <br><br><br><br>
    <div class="row">
<br>
        <div id="main" class="eight columns">
         <?php
         foreach ($veri as $rs) 
         {
           ?>
           <section class="listing-cont">
              <ul>
                <li class="item post">
                  <div class="row">
                    <div class="col-md-4">
                      <a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id?>" class="media-box">
                          <img  src="<?= base_url() ?>uploads/<?=$rs->resim?>" class="img-rounded" sizes="(max-width: 2400px) 100vw, 2400px"/></a>
                      </div>
                      <div class="col-md-8">
                          <div class="post-title">
                            <h3 ><a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id?>" title="<?=$rs->baslik?>"><?=$rs->baslik?></a></h3>
                            <span class="meta-data" style="font-size: 12px;"><i class="fa fa-calendar"></i> <?php echo turkcetarih('j F Y , l',$rs->tarih); ?> - 
                            <?php $kategori=$this->Post_model->kategoricek($rs->kategori_id);?>

                              <a href="<?= base_url() ?>Home/kategori/<?=$rs->kategori_id?>" title="<?=$kategori[0]->kategoriadi?>"><?=$kategori[0]->kategoriadi; ?></a>
                             - <a href="<?= base_url() ?>Home/yazar/<?=$rs->yazar_id?>" title="<?=$rs->yazar_ad?>"><?=$rs->yazar_ad?></a>
                                <hr style="margin-bottom: 5%"></span></div>
                                <div class="entry-content" style="font-size: 13px; line-height: 150%">
                                    <?php
                                    if (strlen($rs->metin) > 500) {
                                      $sonhali = substr($rs->metin, 0, 500); // "Tablo içinde göst"
                                      $sonhali = $sonhali . '...';
                                      echo $sonhali;
                                  } 
                                  else
                                  {
                                    echo $rs->metin;
                                }
                                ?>
                                <div>
                                    <a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->id?>" title="">Devamını Oku »</a></div>
                                </div>

                            </div>
                        </div>
                    </li>
                      <hr> 
                </ul>
            </section>    
            <?php 
        } 
        ?>
       <ul class="pager">
          <?php echo $linkler?>
        </ul>
        
    </div> 
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