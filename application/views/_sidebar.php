        <div id="sidebar" class="four columns"><br>

          <div class="widget widget_search">
            <h3>Search</h3> 
            <form disabled="disabled">

             <input type="text" disabled="disabled" value="Search here..." class="text-search">
             <input type="submit" disabled="disabled" value="" class="submit-search">

           </form>
         </div>

         <div class="widget widget_categories group">
          <h3>Kategoriler</h3> 
          <ul> <?php
            foreach ($veri as $rs) 
            {
              if((count($this->Database_Model->get_data_new("yazilar","kategori_id",$rs->id)))>0)
              {
                ?>
                <li><a href="<?= base_url() ?>Home/kategori/<?=$rs->kategoriadi?>" title="<?=$rs->kategoriadi?>"><?=$rs->kategoriadi?> (<?php echo count($this->Database_Model->get_data_new("yazilar","kategori_id",$rs->id)); ?>)</a></li>   
                <?php 
              }
            } 
            ?>                 
          </ul>
        </div>
        <div class="widget widget_categories group">
          <h3>Son Yazılar</h3> 
          <ul> <?php
            foreach ($yazicek as $rs) 
            {
              if (strlen($rs->baslik) > 25)
              {
                $rs->baslik = substr($rs->baslik, 0, 25);
                $rs->baslik = $rs->baslik . '...';
              } 
              ?>
              <li><a href="<?= base_url() ?>Home/yazi_goster/<?=$rs->link?>" title="<?=$rs->baslik?>"><?=$rs->baslik?></a></li>   
              <?php 
            } 
            ?>                 
          </ul>
        </div>
        <div class="widget widget_categories group">
          <h3>Yazarlar</h3> 
          <ul> <?php
            foreach ($yazarcek as $rs) 
            {
              if((count($this->Database_Model->get_data_new("yazilar","yazar_id",$rs->id)))>0)
              {
                ?>
                <li><a href="<?= base_url() ?>Home/yazar/<?=$rs->link?>" title=""><?=$rs->ad?> (<?php echo count($this->Database_Model->get_data_new("yazilar","yazar_id",$rs->id)); ?>)</a></li>   
                <?php 
              }
            } 
            ?>                 
          </ul>
        </div>
        <div class="widget widget_tags">
         <h3>Post Tags</h3>

         <div class="tagcloud group">
           <?php
           foreach ($veri as $rs) 
           {
            ?>
            <a href="<?= base_url() ?>Home/kategori/<?=$rs->kategoriadi?>"><?=$rs->kategoriadi?></a> 
            <?php 
          } 
          ?> 
        </div>

      </div>

    </div> <!-- end sidebar -->

  </div> <!-- end row -->

</div> <!-- end content-wrap -->

