<?php $admins = $this->getAdmins();?>

<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> Admin Details </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.resetParams().setUrl('<?php echo $this->getUrl('edit', null, null, true) ?>').load()" href="javascript:void(0)"><i class='fa fa-plus'></i> Add Admin </a>
				</div>

			</div><br>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> Name </th>
						<th> status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php if (!$admins): ?>
							<tr><td colspan='5' class = 'text-center font-weight-bold'> No Data Available </td></tr>
					<?php else: ?>
						<?php $i = 1;?>
						<?php foreach ($admins as $key): ?>
							<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key->username ?></td>

							<?php if ($key->status == 1): ?>
								<td><a onclick='mage.setUrl("<?php echo $this->getUrl('status', Null, ['adminId' => $key->adminId, 'status' => $key->status], true) ?>").load()' href='javascript:void(0)' class='text-success'> <i class='fa fa-toggle-on fa-lg'></i> </a></td>
							<?php else: ?>
								<td><a onclick='mage.setUrl("<?php echo $this->getUrl('status', Null, ['adminId' => $key->adminId, 'status' => $key->status], true) ?>").load()' href='javascript:void(0)' class='text-danger'> <i class='fa fa-toggle-off fa-lg'></i> </a></td>
							<?php endif;?>

							<td> <a onclick='mage.setUrl("<?php echo $this->getUrl('edit', Null, ['adminId' => $key->adminId], true) ?>").load()' href='javascript:void(0)' class = 'text-dark mr-2'>
								<i class='fa fa-edit fa-lg'></i>
							</a>
							 <a onclick='remove("<?php echo $this->getUrl('delete', Null, ['adminId' => $key->adminId], true) ?>")' href='javascript:void(0)' class = 'text-dark'> <i class='fa fa-trash fa-lg'></i> </a></td></tr>
							<?php $i++;?>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>