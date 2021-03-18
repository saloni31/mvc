<?php $options = $this->getAttribute()->getOptions();?>
<div class="container mt-3">
	<div class="card bg-light shadow border-0">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-8">
					<h3 class="font-weight-bold">
						Add Attribute Options
					</h3>
				</div>
				<div class="col-sm-4">
					<a class="btn btn-dark text-white" onclick="addRow()" href="javascript:void(0);">
						<i class="fa fa-plus"></i> Add Option
					</a>

					<a class="btn btn-dark ml-2 text-white" onclick = "mage.setForm(document.getElementById('form')).setUrl('<?php echo $this->getUrl("save", "admin_attribute_options") ?>').load();" href="javascript:void(0);">
						<i class="fa fa-edit"></i> Update Option
					</a>
				</div>
			</div>

			<hr>
			<div id="existing-row">
				<?php if (!$options): ?>
					<div> </div>
				<?php else: ?>
				<?php foreach ($options as $key => $option): ?>
				<div class="row">
					<div class="col-sm-4">
						<label class="form-label font-weight-bold">
							Name
						</label>
						<input type="text" name="exist[<?php echo $option->optionId ?>][name]" class="form-control" value="<?php echo $option->name ?>">
					</div>

					<div class="col-sm-4">
						<label class="form-label font-weight-bold" >
							Sort Order
						</label>
						<input type="text" name="exist[<?php echo $option->optionId; ?>][sortOrder]" class="form-control" value="<?php echo $option->sortOrder ?>">
					</div>

					<div class="col-sm-4">
						<button class="btn btn-dark form-control font-weight-bold mt-4" onclick = "removeRow(this)">
							<i class="fa fa-lg fa-trash mr-2"></i> Remove Option
						</button>
					</div>
				</div>
				<?php endforeach;?>
			<?php endif;?>
			</div>
		</div>
	</div>
</div>


<div id="new-row" class="d-none">
	<div class="row mt-2 ">
		<div class="col-sm-4">
			<label class="form-label font-weight-bold">
				Name
			</label>
			<input type="text" name="new[][name]" class="form-control" disabled>
		</div>

		<div class="col-sm-4">
			<label class="form-label font-weight-bold">
				Sort Order
			</label>
			<input type="text" name="new[][sortOrder]" class="form-control" disabled>
		</div>

		<div class="col-sm-4">
			<button class="btn btn-dark form-control font-weight-bold mt-4" onclick = "removeRow(this)">
				<i class="fa fa-lg fa-trash mr-2"></i> Remove Option
			</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	var i = 0;
	function addRow() {
		var row = $("#new-row").clone(true);
		row.find('input').eq(0).attr('name',`new[${i}][name]`);
		row.find('input').eq(1).attr('name',`new[${i}][sortOrder]`);
		i++;
		row.find('input').removeAttr('disabled');
		$("#existing-row").prepend(row.html());
	}

	function removeRow(currentRow) {
		$(currentRow).closest('div').parent().remove();
	}
</script>