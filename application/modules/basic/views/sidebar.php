            <!-- Optionally, you can add icons to the links -->          
		    <li class="treeview">
              <a href="<?=base_url()?>basic"><i class='fa fa-database text-yellow fa-fw'></i><span>จัดการข้อมูลพื้นฐาน</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              	<li><a href="<?=base_url()?>basic/base_product_item"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_product_item->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_product_type"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_product_type->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_research_topic"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_research_topic->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_research_type"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_research_type->desc?></a></li>
              </ul>
            </li>
	<!--
		<li class="treeview">
			<a href="#"><i class='fa fa-desktop fa-fw'></i><span>UI Block Content</span> <i class="fa fa-angle-left pull-right"></i></a>
			 <ul class="treeview-menu">
			 	<li><a href="<?=base_url()?>hello/content">Block content section</a></li>
			 	<li><a href="<?=base_url()?>hello/content/size">Block content size</a></li>
			 	<li><a href="<?=base_url()?>hello/content/color">Block content color</a></li>
			 	<li><a href="<?=base_url()?>hello/content/toolbar">Block content toolbar</a></li>
			 </ul>
		</li>
		<li class="treeview">
			<a href="#"><i class='fa fa-plug fa-fw'></i><span>UI Plugin JS</span> <i class="fa fa-angle-left pull-right"></i></a>
			 <ul class="treeview-menu">
			 	<li><a href="<?=base_url()?>hello/addon/chartjs">ChartJS</a></li>
			 	<li><a href="<?=base_url()?>hello/addon/flot">Flot</a></li>
			 </ul>
		</li> -->         