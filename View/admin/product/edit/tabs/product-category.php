<?php $categories = $this->getCategories();?>

<div class="container mt-4 mb-2">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> Category Details </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.setForm(document.getElementById('form')).setUrl('<?php echo $this->getUrl('update', null, null) ?>').load();" href="javascript:void(0);"><i class='fa fa-edit'></i> Update </a>
				</div>

			</div>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Select </th>
						<th> Category Name </th>
						<th> Description </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$categories): ?>
						<tr><td colspan='5' class = 'text-center font-weight-bold'> No Data Available </td></tr>
 					<?php else: ?>

					<?php foreach ($categories as $key): ?>
						<?php $status = $key->product_category_id ? 'exist' : 'new';?>
						<tr>

							<td><input type="checkbox" name="<?=$status?>[<?=$key->categoryId?>][]" value="<?=$key->categoryId?>" <?php if ($key->product_category_id): ?> checked <?php endif;?>></td>
							<td><?=$this->getCategoryModel()->createCategoryName($key->path)?></td>
							<td><?=$key->description?></td>
						</tr>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>