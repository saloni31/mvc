<?php $media = $this->getMedia();?>
<div class="container mt-4">
	<div class="card shadow bg-light border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-10">
					<h1 class="font-weight-bold">
						Media
					</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-dark text-white" onclick="mage.setForm(document.getElementById('form')).setUrl('<?php echo $this->getUrl("edit", "admin_product_media") ?>').load()" href="javascript:void(0);">
						<i class="fa fa-edit fa-lg">
						</i>
					</a>

					<a class="btn btn-dark text-white" onclick="remove('<?php echo $this->getUrl("remove", "admin_product_media", null) ?>',document.getElementById('form'))" >
						<i class="fa fa-trash fa-lg">
						</i>
					</a>
				</div>
			</div>
			<table class="table table-hover table-stripped" id="myTable">
				<thead>
					<tr>
						<td> Image </td>
						<td> Label </td>
						<td> Small </td>
						<td> Thumb </td>
						<td> Base </td>
						<td> Gallery </td>
						<td> Remove </td>
					</tr>
				</thead>
				<tbody>
					<?php if (!$media): ?>
					<tr>
						<td colspan = '9' class = 'text-center font-weight-bold'> No Data Available
						</td>
					</tr>
					<?php else: ?>
					<?php foreach ($media as $key => $image): ?>
					<tr>
						<td>
							<img src="<?php echo $image->image; ?>" height='100' width='100'>
						</td>
						<td>
							<input type='text' name='label[<?php echo $image->mediaId ?>]' value="<?php echo $image->label ?>">
						</td>
						<td>
							<input type='radio' name='small' value='<?php echo $image->mediaId ?>' <?php if ($image->small): echo "checked";endif?>>
						</td>
						<td>
							<input type='radio' name='thumb' value='<?php echo $image->mediaId ?>' <?php if ($image->thumb): echo "checked";endif?>>
						</td>
						<td>
							<input type='radio' name='base' value='<?php echo $image->mediaId ?>' <?php if ($image->base): echo "checked";endif?>>
						</td>
						<td>
							<input type='checkbox' name='gallery[<?php echo $image->mediaId ?>]' <?php if ($image->gallery): echo "checked";endif?>>
						</td>
						<td>
							<input type='checkbox' name='remove[<?php echo $image->mediaId ?>]'>
						</td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>
				</tbody>
			</table>

			<div class="container mt-3">
				<div class="row">
					<div class="col-sm-9">
						    <input type="file" class="form-control" name="file[]" id = 'file' multiple>
							<!-- <label class="form-label" for="validatedCustomFile">Choose file...</label> -->
					</div>

					<div class="col-sm-3">
						<input type="button"
						 onclick="fileUpload('file','<?php echo $this->getUrl("upload", "admin_product_media"); ?>');"
						 name="upload" value="Upload" class="btn btn-dark">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
