  
<nav id="nav-wrap"> 

  <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
  <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

  <div class="row">                       

    <ul id="nav" class="nav"  style="float: right;">
      <li /*class="current"*/><a href="<?= base_url() ?>">Home</a></li>

      <?php
      foreach ($veri as $rs) 
      {
       ?>
       <li><a href="<?= base_url() ?>home/"><?=$rs->baslik?></a></li>
       <?php 
     } 
     ?>
     <!-- end #nav -->    
     <li><div style="width:350px; display:inline-block float: right;"><a href="#"></a></div></li>          
     <li> <a href="">Hoşgeldin 
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
        <li style=" float: right;"><a href="<?= base_url() ?>login/log_out">Çıkış Yap</a></div></li>
        <?php } 
          else{
            ?>
            <li style=" float: right;"><a href="<?= base_url() ?>login">Giriş Yap</a></div></li>
            <?php
          }
        ?>

      </ul>
    </div> 
  </nav> <!-- end #nav-wrap -->         
