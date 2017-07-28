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
              <strong>E-Mail:</strong> <?=$this->session->flashdata("email_sent"); ?>
            </div>
            <?php
          } ?>
          <!-- form -->
          <form name="contactForm" id="contactForm" method="post" action="<?= base_url() ?>Home/mailgonder">
            <fieldset>
              <div class="group">
                <input name="ad" type="text" id="ad" placeholder="Ad Soyad " required="required" size="35" />
              </div>
              <div class="group">
                <input name="mail" type="email" placeholder="Email" id="mail" required="required" size="35" value="" />
              </div>
              <div class="message group">
                <textarea name="icerik"  required="required" placeholder="Mesajınızı yazınız"  id="icerik" rows="10" cols="50" ></textarea>
              </div>
              <button type="submit" class="submit">Yorum Yap</button>

            </fieldset>
          </form> <!-- Form End -->
        </div> <!-- Respond End -->

      </div>  <!-- Comments End -->		

    </div> <!-- main End -->