<?php $admin = $this->getTableRow();?>

<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if ($this->getRequest()->getGet("adminId")): ?>
				<h2> Update Admin Details </h2>
			<?php else: ?>
				<h2> Add Admin Details </h2>
			<?php endif;?>
		</div>
		<hr>
		<form id="saveForm" class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">
			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="username" class="form-label">Username
					</label>
					<input type="text" name="admin[username]" id="categoryName" class="form-control" value="<?php echo $admin->username ?>">
				</div>

				<div class="col-sm-6">
					<label for="password" class="form-label">
						Password
					</label>
					<input type="password" name="admin[password]" id="description" class="form-control" value="<?php echo $admin->password ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="admin[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($admin->getStatusOptions() as $key => $value): ?>
								<option value="<?php echo $key ?>" <?php if ($admin->status == $key) {?> selected <?php }?>> <?php echo $value ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick="mage.setForm(document.getElementById('saveForm')).load()" name="update" value="<?php if ($this->getRequest()->getGet('adminId')): echo "Update";else:echo "Add";endif;?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>

