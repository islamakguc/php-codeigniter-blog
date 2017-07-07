  
    <nav id="nav-wrap"> 

      <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

      <div class="row">                       

        <ul id="nav" class="nav">
          <li /*class="current"*/><a href="<?= base_url() ?>">Home</a></li>

          <?php
          foreach ($veri as $rs) 
          {
           ?>
           <li><a href="<?= base_url() ?>home/"><?=$rs->baslik?></a></li>
           <?php 
         } 
         ?>

       </ul> <!-- end #nav -->              

     </div> 

   </nav> <!-- end #nav-wrap -->         
