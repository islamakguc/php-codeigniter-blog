   <!-- Content
   ================================================== -->
   <div id="content-wrap"><br>
    <div class="row">

      <div id="main" class="eight columns">
        <div id="comments">
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
          } 
          foreach ($soru as $rs) 
          {
           ?>
              <article class="entry">

                <header class="entry-header">

                    <h2 class="entry-title">
                        <p><?=$rs->baslik?></p>
                    </h2>               
                </header> 

                <div class="entry-content" style="font-size: 13px;">
                    <p><?=$rs->icerik?></p>
                </div>
              </article>
           <?php
         } 
         ?>

       </div> <!-- Respond End -->

     </div>  <!-- Comments End -->		

    </div> <!-- main End -->