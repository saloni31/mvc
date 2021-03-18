<?php $category = $this->getCategory();?>
<?php $categoryId = $this->getRequest()->getGet("categoryId");?>
<?php $id = $categoryId ? $categoryId : null;?>
<?php $parentCategoryData = $category->fetchCategories($id);?>

<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if ($categoryId) {?>
				<h2> Update Category Details </h2>
			<?php } else {?>
				<h2> Add Category Details </h2>
			<?php }?>
		</div>
		<hr>
		<form id="saveForm" class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">
			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="categoryName" class="form-label">Category Name
					</label>
					<input type="text" name="category[categoryName]" id="categoryName" class="form-control" value="<?php echo $category->categoryName ?>">
				</div>

				<div class="col-sm-6">
					<label for="categoryName" class="form-label">
						Parent Category
					</label>
					<?php if (!$parentCategoryData) {?>
						<select class="form-control" name="category[parentCategoryId]" disabled>
					<?php } else {
	?>
						<select class="form-control" name="category[parentCategoryId]" >
							<option value="0"> select </option>
						<?php

	foreach ($parentCategoryData as $key => $parentCategory) {
		?>
							<option value="<?php echo $parentCategory->categoryId ?>" <?php if ($parentCategory->categoryId == $category->parentCategoryId) {
			echo "selected";
		}
		?>> <?php echo $parentCategory->createCategoryName($parentCategory->path) ?></option>
					<?php }}?>
					</select>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-12">
					<label for="description" class="form-label">
						Description
					</label>
					<input type="text" name="category[description]" id="description" class="form-control" value="<?php echo $category->description ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="category[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($category->getStatusOptions() as $key => $value) {?>
								<option value="<?php echo $key ?>" <?php if ($category->status == $key) {?> selected <?php }?>> <?php echo $value ?></option>
						<?php }?>
					</select>
				</div>

				<div class="col-sm-6">
					<label for="featured" class="form-label">
						Featured
					</label><br>
					<select name="category[featured]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($category->getFeaturedOptions() as $key => $value) {?>
								<option value="<?php echo $key ?>" <?php if ($category->featured == $key) {?> selected <?php }?>> <?php echo $value ?></option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick = "mage.setForm(document.getElementById('saveForm')).load();" name="update" value="<?php if ($this->getRequest()->getGet("categoryId")) {echo "Update";} else {echo "Add";}?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>