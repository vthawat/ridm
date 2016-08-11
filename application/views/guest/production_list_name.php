<?php 
$productions=$trader_production_items->get_by_trader_id($id);
if(!empty($productions)) foreach($productions as $item):?>
	<span class="label label-primary"><?$item->product_item_id?></span>
<?php endforeach?>