<?php $categories = $this->getCategories();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-9">
					<h1 class="font-weight-bold"> Category Details </h1>
				</div>

				<div class="col-sm-3">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl('edit', null, null) ?>').load();" href="javascript:void(0);"><i class='fa fa-plus'></i> Add Categories </a>
				</div>

			</div>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Category Name </th>
						<th> Description </th>
						<th> Featured </th>
						<th> Created On </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$categories): ?>
						<tr><td colspan='5' class = 'text-center font-weight-bold'> No Data Available </td></tr>
 					<?php else: ?>
 					<?php $i = 1;?>
					<?php foreach ($categories as $key): ?>
						<tr>
							<td><?=$i?></td>
							<td><?=$key->createCategoryName($key->path)?></td>
							<td><?=$key->description?></td>
							<?php $featured = ($key->featured) ? 'Yes' : 'No';?>
							<td><?=$featured?></td>
							<td><?=$key->createdDate?></td>

							<?php if ($key->status == 1): ?>
								<td><a onclick = 'mage.setUrl("<?=$this->getUrl('status', Null, ['categoryId' => $key->categoryId, 'status' => $key->status], true)?>").load();' href='javascript:void(0);' class='text-success'> <i class='fa fa-toggle-on fa-lg'></i> </a></td>
							<?php else: ?>
								<td><a onclick = 'mage.setUrl("<?=$this->getUrl('status', Null, ['categoryId' => $key->categoryId, 'status' => $key->status], true)?>").load();' href='javascript:void(0);' class='text-danger'> <i class='fa fa-toggle-off fa-lg'></i> </a></td>
							<?php endif;?>

							<td> <a onclick = 'mage.setUrl("<?=$this->getUrl('edit', Null, ['categoryId' => $key->categoryId], true)?>").load();' href='javascript:void(0);' class = 'text-dark mr-2'><i class='fa fa-edit fa-lg'></i></a>

							 <a onclick = 'remove("<?=$this->getUrl('delete', Null, ['categoryId' => $key->categoryId], true)?>");' class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td>
						</tr>
						 <?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>