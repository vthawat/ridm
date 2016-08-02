<div class="board">
                	<form class="form-horizontal frm-trader-update" method="post" action="<?=base_url('trader/put/'.$trader->id)?>">
                    <div class="nav-tabs-custom">
		                 <ul class="nav nav-tabs" id="myTab">

		                     <li class="active bg-light-blue-gradient">
		                     <a href="#profile" data-toggle="tab" title="profile">
		                      <span class="round-tabs one">
		                              <i class="fa fa-home fa-fw"></i>
		                      </span>ที่อยู่/การติดต่อ 
		                  </a></li>
		                  <li class="bg-light-blue-gradient"><a href="#manufacturing" data-toggle="tab" title="manufacturing">
		                         <i class="fa fa-fw fa-cog"></i>
		                     </span>ข้อมูลการผลิต
		          		 </a></li>
		                     <li class="bg-light-blue-gradient">
		                     <a href="#photo" data-toggle="tab" title="photo">
		                      <span class="round-tabs one">
		                              <i class="fa fa-photo fa-fw"></i>
		                      </span>รูปภาพ
		                  </a></li>
		                 <li class="bg-light-blue-gradient"><a href="#product" data-toggle="tab" title="product">
		                          <i class="fa fa-fw fa-paper-plane"></i>
		                     </span>ผลิตภัณฑ์</a>
		                     </li>                 
		                    </ul>
                     </div>
                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="profile">
                      	<div class="col-md-6">
					 	<?php if(!empty($profile_address)):?>
					 		<?=$profile_address?>
					 	<?php endif;?>
					 	</div>
						<div class="col-md-6">
							<?php if(!empty($profile_map)):?>
					 		<?=$profile_map?>
					 	<?php endif;?>
						</div>	
                     </div><!-- endtab -->
                                        
                     
                      <div class="tab-pane fade" id="manufacturing">
					 	<?php if(!empty($profile_manufacturing)):?>
					 		<?=$profile_manufacturing?>
					 	<?php endif;?>
                      </div>
                    <div class="tab-pane fade" id="photo">
					 	<?php if(!empty($profile_photo)):?>
					 		<?=$profile_photo?>
					 	<?php endif;?>
                      </div>  
                      <div class="tab-pane fade" id="product">
					 	<?php if(!empty($profile_product)):?>
					 		<?=$profile_product?>
					 	<?php endif;?>
                      </div>                      

                     

</div>
				<div class="col-md-2 col-sm-2 col-md-offset-5 col-sm-offset-4">
					<p class="well-lg"><button class="btn btn-lg icon-btn btn-success profile-save" type="submit"><span class="btn-glyphicon fa fa-save img-circle text-success"></span>บันทึก</button></p>
				</div>
				</form>
</div>