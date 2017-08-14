   <!-- Content
   ================================================== -->
   <div id="content-wrap"><br><br>
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
            

            <div style="float: left; width: 40%;"><div class="entry-content-media">
              <div class="post-thumb">
                <img height="200" width="200" class="img-circle" src="<?= base_url() ?>uploads/121855704.jpg">
              </div> 
            </div>  
          </div>
          <div class="entry-content" style="font-size: 13px;">
            <p><span><h3><i class="fa fa-user"> <a href="#"><?=$veri[0]->ad?></a></i></h3></span></p>
            <span><h3><i class="<?=$data[0]->resim;?>" > <a href="<?=$data[0]->link;?>" title="<?=$data[0]->ad;?>" target="_blank">Facebook</a> </i></h3></span><br>
            <span><h4><i class="fa fa-envelope"> <a href="mailto:<?=$veri[0]->mail?>"><?=$veri[0]->mail?></a></i></h4></span><br>
            <p><?=$veri[0]->icerik?></p>
          </div> 


        </div> <!-- Respond End -->

      </div>  <!-- Comments End -->		

    </div> <!-- main End -->