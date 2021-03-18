	<div class="w-100 bg-primary">
		<div class="row">
			<!-- <div class="col-sm-2"></div> -->
			<div class="col-sm-10 p-2">
				<h4 class="font-weight-bold ml-5">
					<a href="index.php" class="text-white">
						QUESTECOM
					</a>
				</h4>
			</div>
			<div class="col-sm-2">

					<?php if (!$this->getAdminMessage()->adminId) {?>
						<a class="btn btn-dark btn-block w-50 h-100 font-weight-bold text-white" href="<?php echo $this->getUrl('form', 'admin_login') ?>">
							Login
						</a>
					<?php } else {?>
						<a class="btn btn-dark btn-block w-50 h-100 font-weight-bold text-white" href="<?php echo $this->getUrl('logout', 'admin_login') ?>">
							<i class="fa fa-power-off mr-2"></i>Logout
						</a>
					<?php }?>
				</a>

			</div>
		</div>
	</div>
