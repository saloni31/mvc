<?php $attributes = $this->getAttributes();?>

<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<h2> Attributes </h2>
		</div>
		<hr>
		<div class="mb-2">
		<?php if (!$attributes): ?>
			<h6 class="text-center mb-2"> No Attributes available. </h6>
		<?php else: ?>
		<form id="saveForm" action="<?php echo $this->getUrl("update", "attribute") ?>" method="post">
			<div class="row mb-3 p-3">
				<?php foreach ($attributes as $key => $attribute): ?>
					<?php $options = $this->getOptions()->fetchAllByData("attributeId", $attribute->attributeId);?>
						<div class="col-sm-12 mt-2">
						<label for="categoryName" class="form-label">
						<?=$attribute->name?>
						</label>

						<?php if (strtolower($attribute->inputType) == 'text' || strtolower($attribute->inputType) == 'number'): ?>
						<input type="<?=$attribute->inputType?>" name="<?=$attribute->entityType?>[<?=$attribute->code?>]" id="<?=$attribute->code?>" class="form-control">

						<?php elseif (strtolower($attribute->inputType) == 'select' || strtolower($attribute->inputType) == 'multiselect'): ?>
						<select class="form-control" name="<?=$attribute->code?>" <?php if (strtolower($attribute->inputType) == "multiselect"): ?> multiple <?php endif;?>>
							<option value=" ">Select </option>
							<?php foreach ($options as $key => $option): ?>
								<option value="<?=$option->optionId?>"><?=$option->name?> </option>
							<?php endforeach;?>
						</select>

						<?php elseif (strtolower($attribute->inputType) == 'textarea'): ?>
						<textarea name="<?=$attribute->entityType?>[<?=$attribute->code?>]" id="<?=$attribute->code?>" class="form-control"> </textarea>

						<?php elseif (strtolower($attribute->inputType) == 'checkbox' || strtolower($attribute->inputType) == 'radio'): ?>
							<?php foreach ($options as $key => $option): ?>
							<div class="form-check">
								<input type="<?=$attribute->inputType?>" name = "<?=$attribute->entityType?>[<?=$attribute->code?>][<?=$option->optionId?>]" class="form-check-input" id="<?=$attribute->code?>">
	   							<label class="form-check-label ml-1 mr-3" for="<?=$attribute->code?>">
	   								<?=$option->name?>
	   							</label>
							</div>
							<?php endforeach;?>

						<?php elseif (strtolower($attribute->inputType) == 'date'): ?>
						<input type="date" name="<?=$attribute->entityType?>[<?=$attribute->code?>]" id="<?=$attribute->code?>" class="form-control"> </textarea>

						<?php endif;?>
						</div>
				<?php endforeach;?>
			<?php endif;?>
			</div>

			<!-- <div class="row mt-3 p-3">
				<div class="col-sm-12">
					<input type="button" value ="Save" class="form-control btn btn-dark" onclick="mage.setForm(document.getElementById('saveForm')).load()">
				</div>
			</div> -->

		</form>
	</div>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#selectpicker').multiselect({
    //     	 filterPlaceholder: 'Search',
    //     	 enableCaseInsensitiveFiltering: true,
    //     	 includeSelectAllOption: true,
    //     });
    // });
</script>