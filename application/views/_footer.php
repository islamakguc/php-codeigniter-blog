 <!-- Footer
 ================================================== -->
 <footer>

  <div class="row"> 

    <div class="twelve columns">    
      <ul class="social-links">
       <?php
       foreach ($medya as $rs) 
       {
         ?>
         <li><a href="<?=$rs->link;?>" title="<?=$rs->ad;?>" target="_blank"><i class="<?=$rs->resim;?>"></i></a></li>
         <?php } ?>
       </ul>           
     </div>
     <p class="copyright">&copy; Tüm Hakları Saklıdır - Kaynak Belirtilmeden Alıntı Yapılamaz! &nbsp; Design by <a title="İslam AKGÜÇ" href="http://www.islamakguc.com/">İslam AKGÜÇ</a>.</p>
     
   </div> <!-- End row -->

   <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>

 </footer> <!-- End Footer-->


   <!-- Java Script
   ================================================== -->
   <script src="<?= base_url() ?>assets/js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

   <!-- Script to Activate the Carousel -->
   <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
      })
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url() ?>assets/js/jquery-1.10.2.min.js"><\/script>')</script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>  
    <script src="<?= base_url() ?>assets/js/main.js"></script>

  </body>

  </html>