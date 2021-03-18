<?php $billingAddress = $this->getBillingAddress()?>
<?php $shippingAddress = $this->getShippingAddress()?>
<div class="container mt-4">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<h2>  Billing Address </h2>
		</div>
		<hr>

		<div class="row p-1">
			<div class="col-sm-12">
				<label for="address" class="form-label">
					Address
				</label>
				<textarea class="form-control" name="customer[billing][address]">
					<?php if (!empty($billingAddress->address)): echo $billingAddress->address;else:echo '';endif;?>
				</textarea>
			</div>

		</div>

		<div class="row mt-3 p-1">

			<div class="col-sm-6">
				<label for="city" class="form-label">
					City
				</label>
				<input type="text" name="customer[billing][city]" id="city" class="form-control" value="<?php if ($billingAddress->city): echo $billingAddress->city;else:echo '';endif;?>">
			</div>

			<div class="col-sm-6">
				<label for="zipcode" class="form-label">
					Zipcode
				</label>
				<input type="text" name="customer[billing][zipcode]" id="zipcode" class="form-control" value="<?php if ($billingAddress->zipcode): echo $billingAddress->zipcode;else:echo '';endif;?>">
			</div>
		</div>


		<div class="row mt-3 p-1">
			<div class="col-sm-6">
				<label for="state" class="form-label">
					State
				</label>
				<input type="text" name="customer[billing][state]" id="state" class="form-control" value="<?php if ($billingAddress->state): echo $billingAddress->state;else:echo '';endif;?>">
			</div>

			<div class="col-sm-6">
				<label for="country" class="form-label">
					Country
				</label>
				<input type="text" name="customer[billing][country]" id="country" class="form-control" value="<?php if ($billingAddress->country): echo $billingAddress->country;else:echo '';endif;?>">
			</div>
		</div>
	</div>

	<div class="card shadow font-weight-bold border-0 mt-2">
		<div class="text-center mt-2">
			<h2>  Shipping Address </h2>
		</div>
		<hr>


		<div class="row p-1">
			<div class="col-sm-12">
				<label for="address" class="form-label">
					Address
				</label>
				<textarea class="form-control" name="customer[shipping][address]">
					<?php if ($billingAddress->address): echo $billingAddress->address;else:echo '';endif;?>
				</textarea>
			</div>
		</div>

		<div class="row mt-3 p-1">

			<div class="col-sm-6">
				<label for="city" class="form-label">
					City
				</label>
				<input type="text" name="customer[shipping][city]" id="city" class="form-control" value="<?php if ($billingAddress->city): echo $billingAddress->city;else:echo '';endif;?>">
			</div>

			<div class="col-sm-6">
				<label for="zipcode" class="form-label">
					Zipcode
				</label>
				<input type="text" name="customer[shipping][zipcode]" id="zipcode" class="form-control" value="<?php if ($billingAddress->zipcode): echo $billingAddress->zipcode;endif;?>">
			</div>
		</div>


		<div class="row mt-3 p-1">
			<div class="col-sm-6">
				<label for="state" class="form-label">
					State
				</label>
				<input type="text" name="customer[shipping][state]" id="state" class="form-control" value="<?php if ($billingAddress->state): echo $billingAddress->state;endif;?>">
			</div>

			<div class="col-sm-6">
				<label for="country" class="form-label">
					Country
				</label>
				<input type="text" name="customer[shipping][country]" id="country" class="form-control" value="<?php if ($billingAddress->country): echo $billingAddress->country;endif;?>">
			</div>
		</div>

		<div class="row mt-3 mb-3 p-1">
			<div class="col-sm-6">
				<input type="button" onclick="mage.setForm(document.getElementById('form')).setUrl('<?php echo $this->getUrl("save", "customer_address") ?>').load()" name="update" value="Save" class="form-control btn btn-dark">
			</div>
			<div class="col-sm-6">
				<input type="reset" name="reset" class="form-control btn btn-dark">
			</div>
		</div>
	</div>
</div>