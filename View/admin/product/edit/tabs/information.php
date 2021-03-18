<?php $product = $this->getTableRow();?>

<div class="container mt-4">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php
if ($id = $this->getRequest()->getGet("productId")) {
	?>
				<h2> Product Details </h2>
			<?php } else {?>
				<h2> Add Product Details </h2>
			<?php }?>
		</div>
		<hr>
		<!-- <form id="productForm" class="form ml-2 mr-2" method="post" action="<?php //echo $this->getUrl('save') ?>"> -->

			<div class="row">
				<div class="col-sm-6">
					<label for="productsku" class="form-label">	SKU
					</label>
					<input type="text" name="product[sku]" id="productSku" class="form-control" value="<?php echo $product->sku ?>">
				</div>

				<div class="col-sm-6">
					<label for="productName" class="form-label">Product Name
					</label>
					<input type="text" name="product[name]" id="productName" class="form-control" value="<?php echo $product->name ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="price" class="form-label">
						Price
					</label>
					<input type="text" name="product[price]" id="price" class="form-control" value="<?php echo $product->price ?>">
				</div>

				<div class="col-sm-6">
					<label for="discount" class="form-label">
						Discount
					</label>
					<input type="text" name="product[discount]" id="discount" class="form-control" value="<?php echo $product->discount ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="quantity" class="form-label">
						Quantity
					</label>
					<input type="text" name="product[quantity]" id="quantity" class="form-control" value="<?php echo $product->quantity ?>">
				</div>

				<div class="col-sm-6">
					<label for="description" class="form-label">
						Description
					</label>
					<input type="text" name="product[description]" id="description" class="form-control" value="<?php echo $product->description ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="product[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($product->getStatusOptions() as $key => $value) {?>
								<option value="<?php echo $key ?>" <?php if ($product->status == $key) {?> selected <?php }?>> <?php echo $value ?></option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
				<?php if ($id = $this->getRequest()->getGet("productId")) {?>
					<input type="button" name="update" value="Update" onclick = "mage.setForm(document.getElementById('form')).load();" class="form-control btn btn-dark">
				<?php } else {?>
					<input type="button" onclick = "mage.setForm(document.getElementById('form')).load();" name="update" value="Add" class="form-control btn btn-dark">
				<?php }?>
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		<!-- </form> -->
	</div>
</div>
