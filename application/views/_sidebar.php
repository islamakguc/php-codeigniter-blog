        <div id="sidebar" class="four columns"><br>

            <div class="widget widget_search">
                  <h3>Search</h3> 
                  <form disabled="disabled">

                     <input type="text" disabled="disabled" value="Search here..." class="text-search">
                     <input type="submit" disabled="disabled" value="" class="submit-search">

                  </form>
               </div>

            <div class="widget widget_categories group">
                <h3>Kategoriler.</h3> 
                <ul> <?php
                        foreach ($veri as $rs) 
                        {
                      ?>
                        <li><a href="<?= base_url() ?>Home/kategori/<?=$rs->id?>" title=""><?=$rs->kategoriadi?> (<?php echo count($this->Post_model->deneme($rs->id)); ?>)</a></li>   
                     <?php 
                        } 
                      ?>                 
                    </ul>
                </div>

            <div class="widget widget_tags">
               <h3>Post Tags.</h3>

               <div class="tagcloud group">
               <?php
                        foreach ($veri as $rs) 
                        {
                      ?>
                      <a href="#"><?=$rs->kategoriadi?></a> 
                     <?php 
                        } 
                      ?> 
               </div>
                  
            </div>
            
        </div> <!-- end sidebar -->

    </div> <!-- end row -->

   </div> <!-- end content-wrap -->
   
