<?php $shippingMethods = $this->getShippingMethods();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-9">
					<h1 class="font-weight-bold"> Shipping Methods </h1>
				</div>

				<div class="col-sm-3">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl("edit") ?>').load()" href="javascript:void(0)"><i class='fa fa-plus'></i> Add Shipping Method </a>
				</div>

			</div><br>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Method Name </th>
						<th> Code </th>
						<th> Amount </th>
						<th> Description </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$shippingMethods): ?>
						<tr><td colspan = '7' class = 'text-center font-weight-bold'> No Data Available </td></tr>
					<?php else: ?>
						<?php $i = 1;?>
						<?php foreach ($shippingMethods as $key): ?>
							<tr><td><?php echo $i ?></td>
							<td><?php echo $key->name ?></td>
							<td><?php echo $key->code ?></td>
							<td><?php echo $key->amount ?></td>
							<td><?php echo $key->description ?></td>

							<?php if ($key->status == 1): ?>
								<td><a onclick ='mage.setUrl("<?php echo $this->getUrl('status', Null, ['methodId' => $key->shippingMethodId, 'status' => $key->status], true) ?>").load()' href='javascript:void(0)' class='text-success'> <i class='fa fa-toggle-on fa-lg'></i> </a></td>
							<?php else: ?>
								<td><a onclick ='mage.setUrl("<?php echo $this->getUrl('status', Null, ['methodId' => $key->shippingMethodId, 'status' => $key->status], true) ?>").load()' href="javascript:void(0)" class='text-danger'> <i class='fa fa-toggle-off fa-lg'></i> </a></td>
							<?php endif;?>

							<td> <a onclick ='mage.setUrl("<?php echo $this->getUrl('edit', Null, ['methodId' => $key->shippingMethodId]) ?>").load()' href='javascript:void(0)' class = 'text-dark mr-2'><i class='fa fa-edit fa-lg'></i></a>
							<a onclick='remove("<?php echo $this->getUrl('delete', Null, ['methodId' => $key->shippingMethodId]) ?>")' href='javascript:void(0)' class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td></tr>
							<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>