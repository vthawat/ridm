<div class="box-footer">
<?php if(!empty($geo)) foreach($geo as $item):?>
	<div class="col-md-6 col-sm-6 col-xs-12">
          <a href="#">
          <div class="info-box wow bounceIn">
          <span class="info-box-icon"><img src="<?=base_url('images/geo-pin.png')?>"></span>
            <div class="info-box-content">
              <h4><?=$item->GEO_NAME?></h4>
              <span class="info-box-number text-green text-right"><span class="badge bg-green number"><?=$this->Traders->count_by_geo_id($item->GEO_ID)?></span> <small>รายการ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
     <?php endforeach?>
</div>