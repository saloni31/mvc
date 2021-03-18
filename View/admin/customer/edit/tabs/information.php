<?php $customer = $this->getTableRow();?>
<div class="container mt-4">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if ($this->getRequest()->getGet("customerId")) {?>
				<h2> Update Customer Details </h2>
			<?php } else {?>
				<h2> Add Customer Details </h2>
			<?php }?>
		</div>
		<hr>


			<div class="row">
				<div class="col-sm-6">
					<label for="firstName" class="form-label">
						Customer Group
					</label>
					<select name="customer[groupId]" class="form-control">
						<option value=" ">Select</option>
						<?php foreach ($customer->getCustomerGroup() as $group): ?>
								<option value="<?php echo $group->groupId ?>" <?php if ($customer->groupId == $group->groupId): echo "selected";endif;?>> <?php echo $group->name ?> </option>
						<?php endforeach;?>
					</select>
				</div>

				<div class="col-sm-6">
					<label for="firstName" class="form-label">	First Name
					</label>
					<input type="text" name="customer[firstName]" id="firstName" class="form-control" value="<?php echo $customer->firstName ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="lastName" class="form-label">	Last Name
					</label>
					<input type="text" name="customer[lastName]" id="lastName" class="form-control" value="<?php echo $customer->lastName ?>">
				</div>

				<div class="col-sm-6">
					<label for="email" class="form-label">
						Email
					</label>
					<input type="email" name="customer[email]" id="email" class="form-control" value="<?php echo $customer->email ?>">
				</div>
			</div>

			<?php if (!$this->getRequest()->getGet("customerId")): ?>
				<div class="row mt-3">
				<div class="col-sm-6">
					<label for="password" class="form-label">
						Password
					</label>
					<input type="password" name="customer[password]" id="password" class="form-control">
				</div>

				<div class="col-sm-6">
					<label for="confirmPassword" class="form-label">
						Confirm Password
					</label>
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
				</div>
			</div>

			<?php endif;?>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="mobile" class="form-label">
						Mobile Number
					</label>
					<input type="text" name="customer[mobile]" id="mobile" class="form-control" value="<?php echo $customer->mobile ?>">
				</div>

				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="customer[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($customer->getStatusOptions() as $key => $value): ?>
								<option value="<?php echo $key ?>" <?php if ($customer->status == $key): ?> selected <?php endif;?>> <?php echo $value ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick="mage.setForm(document.getElementById('form')).load()" name="update" value="<?php if ($this->getRequest()->getGet("customerId")): echo "Update";else:echo "Add";endif;?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>