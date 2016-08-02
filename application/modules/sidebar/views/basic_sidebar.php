<li class="treeview">
              <a href="<?=base_url()?>basic"><i class='fa fa-database text-yellow fa-fw'></i><span>จัดการข้อมูลพื้นฐาน</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              	<li><a href="<?=base_url()?>basic/base_product_item"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_product_item->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_product_type"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_product_type->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_research_topic"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_research_topic->desc?></a></li>
                <li><a href="<?=base_url()?>basic/base_research_type"><i class='fa fa-circle-o text-yellow fa-fw'></i><?=$this->base_research_type->desc?></a></li>
              </ul>
</li>      