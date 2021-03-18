<?php $attributes = $this->getAttributes();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-9">
					<h1 class="font-weight-bold"> Attribute Details </h1>
				</div>

				<div class="col-sm-3">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl('edit', null, null) ?>').load();" href="javascript:void(0);"><i class='fa fa-plus'></i> Add Attribute </a>
				</div>

			</div>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Entity Type </th>
						<th> Name </th>
						<th> Code </th>
						<th> Input Type </th>
						<th> SortOrder </th>
						<th> Backend Type </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$attributes): ?>
						<tr>
							<td colspan="8" class="text-center font-weight-bold">
								No Record Found
							</td>
						</tr>
					<?php else: ?>
						<?php $i = 1;?>
						<?php foreach ($attributes as $key => $attribute): ?>
							<tr>
								<td> <?php echo $i ?> </td>
								<td> <?php echo $attribute->entityType ?> </td>
								<td> <?php echo $attribute->name ?> </td>
								<td> <?php echo $attribute->code ?> </td>
								<td> <?php echo $attribute->inputType ?> </td>
								<td> <?php echo $attribute->sortOrder ?> </td>
								<td> <?php echo $attribute->backendType ?> </td>
								<td>
									<a onclick = "mage.setUrl('<?=$this->getUrl('edit', null, ['attributeId' => $attribute->attributeId])?>').load();">
										<i class="fa fa-lg fa-eye text-dark"></i>
									</a>
									<a onclick = "remove('<?=$this->getUrl("delete", null, ['attributeId' => $attribute->attributeId])?>')">
										<i class="fa fa-lg fa-trash text-dark"></i>
									</a>
								</td>
							</tr>
						<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>