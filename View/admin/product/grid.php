<?php $products = $this->getproducts();?>

<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> Product Details </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl('edit', 'admin_product', null, true) ?>').load()" href = "javascript:void(0)"><i class='fa fa-plus'></i> Add Products </a>
				</div>

			</div>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> SKU </th>
						<th> Product Name </th>
						<th> Price </th>
						<th> Discount </th>
						<th> Quantity </th>
						<th> Description </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
if (!$products) {
	echo "<tr><td colspan = '9' class = 'text-center font-weight-bold'> No Data Available </tr></td>";
} else {
	$i = 1;
	foreach ($products as $key) {
		echo "<tr><td>" . $i . "</td>";
		echo "<td>" . $key->sku . "</td>";
		echo "<td>" . $key->name . "</td>";
		echo "<td>" . $key->price . "</td>";
		echo "<td>" . $key->discount . "</td>";
		echo "<td>" . $key->quantity . "</td>";
		echo "<td>" . $key->description . "</td>";

		if ($key->status == 1) {
			echo "<td><a href='javascript:void(0)' onclick='mage.setUrl(\"{$this->getUrl('status', 'admin_product', ['productId' => $key->productId, 'status' => $key->status], true)}\").load();' class='text-success'> <i class='fa fa-toggle-on fa-lg'> </a></td>";
		} else {
			echo "<td><a href='javascript:void(0)' onclick='mage.setUrl(\"{$this->getUrl('status', 'admin_product', ['productId' => $key->productId, 'status' => $key->status], true)}\").load();' class='text-danger'> <i class='fa fa-toggle-off fa-lg'> </a></td>";
		}

		echo "<td> <a href='javascript:void(0)' onclick='mage.setUrl(\"{$this->getUrl('edit', 'admin_product', ['productId' => $key->productId])}\").load();' class = 'text-dark mr-2'><i class='fa fa-edit fa-lg'></i></a>";
		echo "<a <a href='javascript:void(0)' onclick='remove(\"{$this->getUrl('delete', Null, ['productId' => $key->productId])}\")	;' class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td></tr>";
		$i++;
	}}
?>
				</tbody>
			</table>
		</div>
	</div>
</div>
