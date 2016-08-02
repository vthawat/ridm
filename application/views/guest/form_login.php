<div class="panel panel-default">
	<div class="panel-heading"><h4><i class="fa fa-key"></i> เข้าสู่ระบบ</h4></div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="post" action="<?=base_url('trader')?>">
				<div class="form-group">
					<label for="username" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Sign in</button>
					</div>
				</div>
			</form>
		</div>
</div>