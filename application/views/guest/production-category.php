<div class="box-footer">
<?php if(!empty($product_category)) foreach($product_category as $item):?>
	<div class="col-md-6 col-sm-6 col-xs-12">
          <a href="#">
          <div class="info-box wow bounceInUp">
            <span class="info-box-icon"><img src="<?=base_url('images/productions/'.$item->product_icon.'.png')?>"></span>

            <div class="info-box-content">
              <h4><?=$item->product_type?></h4>
              <span class="info-box-number text-green text-right"><h3 class="badge bg-green number"><?=$this->Productions->count_by_product_type($item->id)?></h3> <small>รายการ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
     <?php endforeach?>
</div>