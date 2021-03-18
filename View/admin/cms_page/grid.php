<?php $pages = $this->getPages();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold"> CMS Pages </h1>
				</div>

				<div class="col-sm-2">
					<a class="btn btn-dark" onclick="mage.setUrl('<?php echo $this->getUrl('edit', null, null) ?>').load();" href="javascript:void(0);">
						<i class='fa fa-plus'></i> Add CMS Page
					</a>
				</div>

			</div><br>
			<table class="table table-stripped table-hovered" id="myTable">
				<thead>
					<tr class="font-weight-bold">
						<th> Sr. No. </th>
						<th> title </th>
						<th> Identifier </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				<?php if (!$pages): ?>
					<tr>
						<td colspan="6" class="text-center font-weight-bold">
							No Record Found.
						</td>
					</tr>
				<?php else: ?>
					<?php $i = 1;?>
					<?php foreach ($pages as $key => $page): ?>
						<tr>
							<td> <?php echo $i ?> </td>
							<td> <?php echo $page->title ?> </td>
							<td> <?php echo $page->identifier ?> </td>
							<td>
								<?php if ($page->status == 1): echo "Enable";?>
															<?php else:echo "Disable";endif;?>
							</td>
							<td>
								<a onclick="mage.setUrl('<?php echo $this->getUrl('edit', null, ['pageId' => $page->pageId]) ?>').load();" href="javascript:void(0);">
									<i class="text-dark fa fa-lg fa-edit"></i>
								</a>
								<a onclick="remove('<?php echo $this->getUrl('delete', null, ['pageId' => $page->pageId]) ?>');" href="javascript:void(0);">
									<i class="text-dark fa fa-lg fa-trash"></i>
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