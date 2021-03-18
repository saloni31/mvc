<?php $customerGroup = $this->getCustomerGroup();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> Customer Group Details </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl("edit", null, null, true) ?>').load()" href="javascript:void(0)"><i class='fa fa-plus'></i> Add Customer Group </a>
				</div>

			</div><br>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Name </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$customerGroup): ?>
						<tr><td colspan = '7' class = 'text-center font-weight-bold'> No Data Available. </td></tr>
					<?php else: ?>
						<?php $i = 1;?>
						<?php foreach ($customerGroup as $key): ?>
							<tr><td><?php echo $i ?></td>
							<td><?php echo $key->name ?></td>
							<?php $status = ($key->status) ? 'Enable' : 'Disable';?>
							<td> <?php echo $status ?> </td>

							<td> <a onclick='mage.setUrl("<?php echo $this->getUrl('edit', Null, ['groupId' => $key->groupId]) ?>").load()' href='javascript:void(0)' class = 'text-dark mr-2'><i class='fa fa-edit fa-lg'></i></a>
							<a onclick='remove("<?php echo $this->getUrl('delete', Null, ['groupId' => $key->groupId]) ?>")' href="javascript:void(0)" class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td></tr>
							<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>