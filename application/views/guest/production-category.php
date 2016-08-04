<div class="box-footer">
<?php if(!empty($product_category)) foreach($product_category as $item):?>
	<div class="col-md-6 col-sm-6 col-xs-12">
          <a href="#">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-paper-plane"></i></span>

            <div class="info-box-content">
              <h4><?=$item->product_type?></h4>
              <span class="info-box-number label label-success"><?=$this->Productions->count_by_product_type($item->id)?> <small>รายการ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
     <?php endforeach?>
</div>