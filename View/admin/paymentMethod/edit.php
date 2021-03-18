<?php $payment = $this->getTableRow();?>

<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if ($this->getRequest()->getGet("methodId")): ?>
				<h2> Update Payment Method Details </h2>
			<?php else: ?>
				<h2> Add Payment Method Details </h2>
			<?php endif;?>
		</div>
		<hr>
		<form id="form" class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="methodName" class="form-label">Method Name
					</label>
					<input type="text" name="payment[name]" id="methodName" class="form-control" value="<?php echo $payment->name ?>">
				</div>

				<div class="col-sm-6">
					<label for="code" class="form-label">
						Code
					</label>
					<input type="text" name="payment[code]" id="code" class="form-control" value="<?php echo $payment->code ?>">
				</div>
			</div>

			<div class="row mt-3">

				<div class="col-sm-6">
					<label for="description" class="form-label">
						Description
					</label>
					<input type="text" name="payment[description]" id="description" class="form-control" value="<?php echo $payment->description ?>">
				</div>

				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="payment[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($payment->getStatusOptions() as $key => $value): ?>
								<option value="<?php echo $key ?>" <?php if ($payment->status == $key): ?> selected <?php endif;?>> <?php echo $value ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick="mage.setForm(document.getElementById('form')).load()" name="update" value="<?php if ($this->getRequest()->getGet("methodId")): echo "Update";else:echo "Add";endif;?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>