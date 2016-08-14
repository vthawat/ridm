<?php switch ($this->router->fetch_method()) {
	case 'km':
		print '<h4><a href="'.base_url().'"><i class="fa fa-home fa-fw"></i>หน้าหลัก</a><i class="fa fa-fw fa-angle-double-right"></i><span>การจัดการความรู้ที่เกี่ยวกับอุตสาหกรรมยางพาราปลายน้ำ</span></h4>';
		break;
	case 'production':
		print '<h4><a href="'.base_url().'"><i class="fa fa-home fa-fw"></i>หน้าหลัก</a><i class="fa fa-fw fa-angle-double-right"></i><span>ผลิตภัณฑ์อุตสาหกรรมยางพาราปลายน้ำ</span></h4>';
	break;
	case 'trader':
		print '<h4><a href="'.base_url().'"><i class="fa fa-home fa-fw"></i>หน้าหลัก</a><i class="fa fa-fw fa-angle-double-right"></i><span>ผู้ประกอบการอุตสาหกรรมยางพาราปลายน้ำ</span></h4>';
	break;
	case 'member_regist':
		print '<h4><a href="'.base_url().'"><i class="fa fa-home fa-fw"></i>หน้าหลัก</a><i class="fa fa-fw fa-angle-double-right"></i><span>สมัครสมาชิกเข้าใช้งานระบบ</span></h4>';
	break;
	default:
		# code...
		break;
}?>