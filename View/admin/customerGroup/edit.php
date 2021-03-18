<?php $customerGroup = $this->getTableRow();?>

<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0 w-75 ml-5">
		<div class="text-center mt-2">
			<?php if ($this->getRequest()->getGet("groupId")): ?>
				<h2> Update Customer Group Details </h2>
			<?php else: ?>
				<h2> Add Customer Group Details </h2>
			<?php endif;?>
		</div>
		<hr>
		<form id="form" class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">

			<div class="row mt-3">
				<div class="col-sm-12">
					<label for="methodName" class="form-label">
					 Name
					</label>
					<input type="text" name="group[name]" id="methodName" class="form-control" value="<?php echo $customerGroup->name ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-12">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="group[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($customerGroup->getDefaultOptions() as $key => $value): ?>
								<option value="<?php echo $key ?>" <?php if ($customerGroup->status == $key): ?> selected <?php endif;?>> <?php echo $value ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>


			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick="mage.setForm(document.getElementById('form')).load()" name="update" value="<?php if ($this->getRequest()->getGet("groupId")): echo "Update";else:echo "Add";endif;?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>