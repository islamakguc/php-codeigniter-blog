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
            <?php } ?>
            
           <article class="entry">

            <header class="entry-header">

              <h2 class="entry-title">
                <p>asasdasdasd</p>
              </h2>               
            </header> 
            <div class="entry-content-media">
              <div class="post-thumb">
              <img height="200" width="200" class="img-circle" src="<?= base_url() ?>uploads/121855704.jpg">
             </div> 
           </div>
            <div class="entry-content" style="font-size: 13px;">
              <p>adasdas</p>
            </div>
          </article>


        </div> <!-- Respond End -->

      </div>  <!-- Comments End -->		

    </div> <!-- main End -->