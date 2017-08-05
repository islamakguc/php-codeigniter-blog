<div id="content-wrap">
  <br>
  <div class="row">
    <div id="main" class="eight columns">
      <div id="comments">
        <div class="respond">          
          <article class="entry">
            <div class="entry-content-media">
              <div class="post-thumb">
               <section id="schedule">
                <div class="row">
                  <div class="col-md-12">
                    <div class="cd-timeline cd-container">
                      <?php
                      foreach ($soru as $rs) 
                      {
                       ?>
                       <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-movie bounce-in"><i class="fa fa-user"></i></div>
                        <div class="cd-timeline-content bounce-in">
                          <div class="row equal-height">
                          <div class="col-md-12 pr-0 sm-height-auto" style="min-height: 12.43em;">
                              <div class="cd-content-left p-15">
                               <h3 class="timeline-title"><?php echo $rs->baslik?> </h3>
                               <div class="cd-speaker clearfix" style="font-size: 12px"><?php echo $rs->icerik?> 
                               </div>
                             </div>
                           </div>

                         </div>
                       </div>
                     </div>
                     <?php 
                   } 
                   ?>
                 </div>
               </div>
             </div>
           </section>
         </div> 
       </div>
     </article>
   </div> 
 </div>   
</div> 














