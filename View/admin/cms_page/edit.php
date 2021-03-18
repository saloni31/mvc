<?php $page = $this->getTableRow();?>
<?php $pageId = $this->getRequest()->getGet("pageId");?>
<div class="container mt-5">
	<div class="card shadow font-weight-bold border-0">
		<div class="text-center mt-2">
			<?php if ($pageId): ?>
				<h2> Update CMS Page Details </h2>
			<?php else: ?>
				<h2> Add CMS Page Details </h2>
			<?php endif;?>
		</div>
		<hr>
		<form id="saveForm" class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">
			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="title" class="form-label">title
					</label>
					<input type="text" name="cms[title]" id="categoryName" class="form-control" value="<?php echo $page->title ?>">
				</div>

				<div class="col-sm-6">
					<label for="identifier" class="form-label">
						Identifier
					</label>
					<input type="text" name="cms[identifier]" id="identifier" class="form-control" value="<?php echo $page->identifier ?>">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-12">
					<label for="content" class="form-label">
						Content
					</label>
					<textarea name="cms[content]" id="content">
						<?php echo $page->content ?>
					</textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-6">
					<label for="status" class="form-label">
						Status
					</label><br>
					<select name="cms[status]" class="form-control">
						<option value=" ">select</option>
						<?php foreach ($page->getStatusOptions() as $key => $status): ?>
								<option value="<?php echo $key ?>" <?php if ($page->status == $key): ?> selected <?php endif;?>> <?php echo $status ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>


			<div class="row mt-3 mb-3">
				<div class="col-sm-6">
					<input type="button" onclick = "submitContent('<?php echo $this->getUrl("save") ?>')" name="update" value="<?php if ($pageId): ?> Update <?php else: ?> Add <?php endif;?>" class="form-control btn btn-dark">
				</div>
				<div class="col-sm-6">
					<input type="reset" name="reset" class="form-control btn btn-dark">
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
CKEDITOR.replace('content',{

  width: "100%",
  height: "200px"

});

</script>