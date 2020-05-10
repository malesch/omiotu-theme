			<!-- footer -->
       <div class="footer">
       <div class="container">
      <div class="footer-center">
      <div class="row">
      <div class="col-xs-1 text-right"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/cc.png" alt="Creative Commons" /></div>
      <div class="col-xs-4 line-dots">Attribution-NonCommercial-NoDerivs 3.0 Unported (CC BY-NC-ND 3.0)<br /><span><a href="https://creativecommons.org/licenses/by-nc-nd/3.0/" target="_blank">creativecommons.org/licenses/by-nc-nd/3.0/</a></span></div>
     <!-- <div class="col-xs-1 "><div class="leben-footer">programmed by <a  href="http://www.leben.cz" target="_blank" >www.leben.cz</a><br />thanks to oliveta init</div></div>-->
     
      </div>
      
      </div>
       <a href="https://www.facebook.com/tscheiderbauer" target="_blank" class="fb-footer"><img src="<?php echo get_template_directory_uri(); ?>/img/fbicon.png" alt="FB" />   
           </a>
        
      </div>
    </div>
		<?php wp_footer(); ?>

		
		
<div class="modal fade" id="emailsubscribe" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Email notifications</h4>
      </div>
      <div class="modal-body">
      <p>leave your name and e-mail an get my newsletter.
no worries it will come max. once a month..</p>
       <div id="es_msg_pg"></div>
       
       <div class="form-group">
    <label >Name</label>
    <input class="es_textbox_class form-control " name="es_txt_name_pg" id="es_txt_name_pg" value="" maxlength="225" type="text"></div>
        
  <div class="form-group">
    <label >Email</label>
    <input class="form-control es_textbox_class" name="es_txt_email_pg" id="es_txt_email_pg" onkeypress="if(event.keyCode==13) es_submit_pages('<?php echo get_home_url(); ?>')" value="" maxlength="225" type="text">
    </div>
     <input name="es_txt_group_pg" id="es_txt_group_pg" value="" type="hidden"></div>      
     
     
     
   
      
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" name="es_txt_button_pg" id="es_txt_button_pg" onclick="return es_submit_pages('<?php echo get_home_url(); ?>')" class="btn btn-subscribe">Subscribe</button>
      </div>
      
     
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	</body>
</html>
