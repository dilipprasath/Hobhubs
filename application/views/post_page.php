<section>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6 offset6">
        <ul class="unstyled inline chat_minz">
          <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg"></a></li>
          <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo2.jpg"></a></li>
          <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo3.jpg"></a></li>
          <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo4.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>  
</section>
      <!--Popup Code Start-->
      <div class="md-modal md-effect-2" id="modal-2">
        <div class="md-content"><br>
          <div>
            <div class="container-fluid">
              <div class="row-fluid bs-docs-example">               
                <ul id="myTab" class="nav nav-tabs">
                <li class="active span3 offset2"><a href="#dropdown1" data-toggle="tab">Posts</a></li>
                 <li class="span3 offset3"><a href="#dropdown2" data-toggle="tab">Blogs</a></li>
                 </ul>
              </div>
              <br>
              <div id="myTabContent" class="tab-content"> 
                <!--Post Popup Start-->
                <div class="tab-pane fade active in" id="dropdown1">
                  <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span8 post_box">
                      <textarea name="post_text" placeholder="What are you up to...."></textarea>
                    </div>
                    <div class="span2 post_icon_ligap">
                      <ul class="unstyled">
                        <li><a href="#" rel="tooltip" title="Add Image"><img src="<?php echo asset_url('img/camera-icon.png') ?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Link with Related Hobby"><img src="<?php echo asset_url('img/hobby-icon.png') ?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Add your Location"><img src="<?php echo asset_url('img/location-icon.png') ?>"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Post Popup End--> 
                <!--Blog Popup Start-->
                <div class="tab-pane fade" id="dropdown2">
                  <div class="row-fluid">
                    <div class="span2 post_icon_ligap">
                      <ul class="unstyled">
                        <li><a href="#" rel="tooltip" title="Italic Font"><img src="<?php echo asset_url('img/italic-icon.png') ?>"></a><a href="#" 

rel="tooltip" title="Bold Font"><img src="<?php echo asset_url('img/bold-icon.png')?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Remove Attachment"><img src="<?php echo asset_url('img/unattach-icon.png') ?>"></a><a href="#" 

rel="tooltip" title="File Attachment"><img src="<?php echo asset_url('img/attach-icon.png')?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Bullet List"><img src="<?php echo asset_url('img/ul-list-icon.png') ?>"></a><a href="#" 

rel="tooltip" title="Numbered List"><img src="<?php echo asset_url('img/ol-list-icon.png')?>"></a></li>
                      </ul>
                    </div>
                    <div class="span8 post_box">
                      <div class="input-append">
                        <input class="input-xlarge" id="appendedInput" type="text" placeholder="Title">
                        <span class="add-on"><a href="#" rel="tooltip" title="Edit"><img src="<?php echo asset_url('img/edit-icon.png')?>"></a></span> </div>
                      <textarea name="post_text" placeholder="What are you up to...."></textarea>
                      <div class="input-append">
                        <input class="input-xlarge" id="appendedInput" type="text" placeholder="Tags">
                        <span class="add-on"><a href="#" rel="tooltip" title="Edit"><img src="<?php echo asset_url('img/edit-icon.png')?>"></a></span> </div>
                    </div>
                    <div class="span2 post_icon_ligap ">
                      <ul class="unstyled">
                        <li><a href="#" rel="tooltip" title="Add Image"><img src="<?php echo asset_url('img/camera-icon.png')?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Save"><img src="<?php echo asset_url('img/save-icon.png')?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Write HTML Code"><img src="<?php echo asset_url('img/html-icon.png')?>"></a></li>
                        <li><a href="#" rel="tooltip" title="Spelling Check"><img src="<?php echo asset_url('img/spellcheck-icon.png')?>"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Blog Popup End--> 
              </div>
              <div class="row-fluid bs-docs-example postpop_menu2">
               <ul id="myTab" class="nav nav-tabs">
                <li class="span3 offset2"><a href="#">Share</a></li>
                 <li class="span3 offset3"><a href="#" class="md-close">Cancel</a></li>
                 </ul>             
               </div>
            </div>
          </div>
        </div>
       </div>
      <div class="md-overlay"></div>
      <!--Popup Code End-->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2 offset10 add_post_text"><a href="#">
      <button class="md-trigger btn btn-link" data-modal="modal-2"><img src="<?php echo asset_url('img/add-icon.png') ?>"><span>Add Text</span></button>
      </a> </div>
  </div>
  <div class="row-fluid">
    <div class="span2 add-blog-box"> <a href="#">
      <button class="md-trigger btn btn-link" data-modal="modal-2"><img src="<?php echo asset_url('img/add-icon.png') ?>"> <br>
      <span>Add Text</span></button>
      </a></div>
  </div>
</div>      
<div class="margin_tp_40">&nbsp;</div>
<div class="margin_tp_40">&nbsp;</div>
