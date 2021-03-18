<?php $groupPrice = $this->getGroupPrice();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> Product Group Price </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.setForm(document.getElementById('form')).setUrl('<?php echo $this->getUrl('save', 'admin_product_groupPrice') ?>').load()" href = "javascript:void(0)"><i class='fa fa-edit'></i> Update</a>
				</div>

			</div>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Group Name </th>
						<th> Product Price </th>
						<th> Group Price </th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;?>
					<?php foreach ($groupPrice as $group => $price): ?>
					<?php $statusKey = (is_null($price->entityId)) ? 'new' : 'exist';?>
					<tr>
						<td> <?php echo $i ?></td>
						<td> <?php echo $price->name ?></td>
						<td> <?php echo $price->price ?></td>
						<td> <input type="text" name="price[<?php echo $statusKey ?>][<?php echo $price->groupId ?>]" value="<?php echo $price->groupPrice ?>"> </td>
					</tr>
					<?php $i++;?>
					<?php endforeach;?>

				</tbody>
			</table>
		</div>
	</div>
</div>