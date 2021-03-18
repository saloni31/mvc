<?php $attribute = $this->getAttribute()?>
<?php $attributeId = $this->getRequest()->getGet("attributeId")?>
<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if (!$attributeId): ?>
				<h3> Add Attribute </h3>
			<?php else: ?>
				<h3> Attribute Information </h3>
			<?php endif;?>
		</div>
		<hr>
		<div class="row mt-3 ml-1 mr-1">
			<div class="col-sm-6">
				<label for="entityType" class="form-label">Entity Type
				</label>
				<select name="attribute[entityType]" class="form-control">
					<option value="	">Select</option>
					<?php foreach ($attribute->getEntityType() as $entity => $type): ?>
						<option value="<?php echo $entity ?>" <?php if ($attribute->entityType == $entity): ?> selected <?php endif;?>> <?php echo $type; ?> </option>
					<?php endforeach;?>
				</select>
			</div>

			<div class="col-sm-6 ">
				<label for="name" class="form-label">
					Name
				</label>
				<input type="text" name="attribute[name]" id="name" class="form-control" value="<?php echo $attribute->name ?>">
			</div>
		</div>

		<div class="row mt-3 ml-1 mr-1">
			<div class="col-sm-6">
				<label for="code" class="form-label">
					Code
				</label>
				<input type="text" name="attribute[code]" id="code" class="form-control" value="<?php echo $attribute->code ?>">
			</div>

			<div class="col-sm-6">
				<label for="sortOrder" class="form-label">
					Sort Order
				</label>
				<input type="text" name="attribute[sortOrder]" id="sortOrder" class="form-control"
				value="<?php echo $attribute->sortOrder ?>">
			</div>
		</div>

		<div class="row mt-3 ml-1 mr-1">
			<div class="col-sm-6">
				<label for="inputType" class="form-label">Input Type
				</label>
				<select name="attribute[inputType]" class="form-control">
					<option value="	">Select</option>
					<?php foreach ($attribute->getInputType() as $input => $type): ?>
						<option value="<?php echo $input ?>" <?php if ($attribute->inputType == $input): ?> selected <?php endif;?>> <?php echo $type; ?> </option>
					<?php endforeach;?>
				</select>
			</div>

			<div class="col-sm-6">
				<label for="backendType" class="form-label">
					Backend Type
				</label>
				<select name="attribute[backendType]" class="form-control">
					<option value="	">Select</option>
					<?php foreach ($attribute->getBackendType() as $backend => $type): ?>
						<option value="<?php echo $backend ?>" <?php if ($attribute->backendType == $backend): ?> selected <?php endif;?>> <?php echo $type; ?> </option>
					<?php endforeach;?>
				</select>
			</div>
		</div>

		<?php if (!$attributeId): ?>
		<div class="row mt-3 mb-3 ml-1 mr-1">
			<div class="col-sm-6">
				<input type="button" onclick="mage.setForm(document.getElementById('form')).load()" name="update" value="Add" class="form-control btn btn-dark">
			</div>
			<div class="col-sm-6">
				<input type="reset" name="reset" class="form-control btn btn-dark">
			</div>
		</div>
	<?php endif;?>
	<div class="mb-3"></div>
	</div>
</div>