  
<nav id="nav-wrap"> 

  <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
  <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
  <div class="row">                       

    <ul id="nav" class="nav"  style="float: right;">
      <li><a href="<?= base_url() ?>">Anasayfa</a></li>
      <li><a href="<?= base_url() ?>Home/benkimim">Ben Kimim?</a></li>
      <li><a href="<?= base_url() ?>Home/sss">S.S.S</a></li>
      <li><a href="<?= base_url() ?>Home/bize_ulasin">İletişim</a></li>
     <!-- end #nav -->    
     <li><div style="width:180px; display:inline-block float: right;"><a href=""></a></div></li>

     <li> <a href="

      <?php 
          if($this->session->oturum_data['yetki']=="Üye"){
            echo base_url()."uye";
          }
          elseif($this->session->oturum_data['yetki']=="Admin"){
            echo base_url()."admin";
          }
          else{
            echo "";
          }
      ?>
      ">Hoşgeldin 
      <?php 
      if( $this -> session -> userdata('oturum_data'))
      {
        echo  $this->session->oturum_data['ad'];
      }
      else
      {
        echo "Ziyaretci";
      }
      ?></a></li>
      <?php 
      if( $this -> session -> userdata('oturum_data'))
      {
        ?>
        <li style=" float: right;"><a href="<?= base_url() ?>Login/log_out">Çıkış Yap</a></li>
        <?php } 
        else{
          ?>
          <li><div style=" display:inline-block float: right;"><a href="<?= base_url() ?>Login"> Giriş Yap  </a></div></li>   
          <li style=" float: right;"><a href="<?= base_url() ?>Login/kayit">Kayıt Ol</a></li>

          <?php
        }
        ?>

      </ul>
    </div> 
  </nav> <!-- end #nav-wrap -->  
