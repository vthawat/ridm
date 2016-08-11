<h3 class="page-header text-success">ผลิตภัณฑ์</h3>
<?php if(!empty($product_items)) foreach($product_items as $item):?>
              <div class="form-group col-md-2 col-sm-3 col-xs-6">
                <label>
                  <input type="checkbox" class="products" value="<?=$item->id?>" <?php if(!empty($products->get_by_trader_id_and_product_id($trader->id,$item->id))) print 'checked';?>> <span class="product-title"><?=$item->product_name?></span>
                </label>
              </div>
<?php endforeach;?>
<div class="clearfix"></div>
<form class="form-horizontal" method="post" action="<?=base_url('trader/production/post/'.$trader->id)?>">
<div class="production_items">
	<ul class="list-group products-list">
	</ul>
</div>
				<div class="col-md-2 col-sm-2 col-md-offset-5 col-sm-offset-4">
					<p class="well-lg"><button class="btn btn-lg icon-btn btn-success production-save" type="submit"><span class="btn-glyphicon fa fa-save img-circle text-success"></span>บันทึก</button></p>
				</div>
				</form>