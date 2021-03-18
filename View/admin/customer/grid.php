<?php $customers = $this->getCustomers();?>
<!-- <div class="container mt-4"> -->
	<div class="card shadow bg-light border-0 mt-4 h-100">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-9">
					<h1 class="font-weight-bold"> Customer Details </h1>
				</div>

				<div class="col-sm-3">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl('edit', 'admin_customer', null, true) ?>').load();" href="javascript:void(0);"><i class='fa fa-plus'></i> Add Customers </a>
				</div>

			</div><br>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Group Name </th>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Email </th>
						<th> Mobile Number </th>
						<!-- <th> Billing Address </th> -->
						<th> Pincode </th>
						<th> Status </th>
						<th colspan="2"> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$customers): ?>
						<tr><td colspan = '7' class = 'text-center font-weight-bold'> No Data Available. </td></tr>
					<?php else: ?>
						<?php $i = 1;?>
						<?php foreach ($customers as $key): ?>
							<tr><td><?php echo $i ?> </td>
							<td><?php echo $key->name ?></td>
							<td><?php echo $key->firstName ?> </td>
							<td><?php echo $key->lastName ?></td>
							<td><?php echo $key->email ?> </td>
							<td><?php echo $key->mobile ?></td>
							 <!-- if($key->addressType == 0){
							 	echo "<td>".$key->address."</td>";
							 }else
							 	echo "<td></td>"; -->
							<td> <?php echo $key->zipcode ?></td>
							<?php if ($key->status == 1): ?>
								<td><a href='javascript:void(0)' onclick='mage.setUrl("<?php echo $this->getUrl('status', 'admin_customer', ['customerId' => $key->customerId, 'status' => $key->status], true) ?>").load()' class='text-success'> <i class = 'fa fa-toggle-on fa-lg'></i> </a></td>
							<?php else: ?>
								<td><a href='javascript:void(0)' onclick='mage.setUrl("<?php echo $this->getUrl('status', 'admin_customer', ['customerId' => $key->customerId, 'status' => $key->status], true) ?>").load()' class=' text-danger'> <i class = 'fa fa-toggle-off fa-lg'></i> </a></td>
							<?php endif;?>

							<td colspan='2'> <a href='javascript:void(0)' onclick='mage.setUrl("<?php echo $this->getUrl('edit', 'admin_customer', ['customerId' => $key->customerId]) ?>").load()' class = 'text-dark mr-2'><i class='fa fa-edit fa-lg'></i></a>
							<a href='javascript:void(0)' onclick='remove("<?php echo $this->getUrl('delete', 'admin_customer', ['customerId' => $key->customerId]) ?>")' class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td></tr>
							<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
<!-- </div>  -->