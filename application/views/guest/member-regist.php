		<form class="form-horizontal" role="form" method="post" action="<?=base_url('guest/member_regist/new')?>">
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-md-4 col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="newuser@email.com" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-md-4 col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
					<span class="help-block">*กำหนดอย่างน้อย 6 ตัวอักษร</span>
					</div>
				</div>
				<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">ชื่อ</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-2 control-label">นามสกุล</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="phone" class="col-sm-2 control-label">หมายเลขโทรศัพท์</label>
					<div class="col-md-4 col-sm-10">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="user_role_id" class="col-sm-2 control-label">ระดับสิทธิ์</label>
					<div class="col-md-4 col-sm-10">
					 <select class="form-control" id="user_role_id" name="user_role_id" required="">
					 	<option>--เลือกระดับสิทธิ์--</option>
					 	<?php if(!empty($list_role)) foreach($list_role as $item):?>
					 		<?php if($item['id']!=1):?>
					 	<option value="<?=$item['id']?>"><?=$item['role_name']?></option>
					 		<?php endif?>
					 	<?php endforeach?>	
					 </select>
					</div>
				</div>
				<div class="form-group">
					<label for="captcha" class="col-sm-2 control-label">รหัสความปลอดภัย</label>
					<div class="col-md-4 col-sm-10">
					<?=$captcha['image']?>
					<input type="text" class="form-control" id="captcha" name="captcha" placeholder="" required="">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Register</button>
					</div>
				</div>
			</form>