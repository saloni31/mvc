<!DOCTYPE html>
<html>
<?=$this->createBlock("Block\Core\Layout\head")->toHtml();?>
<body>
	<div class="container-fluid">
		<div class="row bg-dark text-center mb-2">
			<h1 class="text-white"> Header </h1>
		</div>

		<div class="row mb-2">

			<div class="col-sm-10 bg-dark border" style="height:525px">
				<h1 class="text-center text-white"> Content </h1>
			</div>

			<div class="col-sm-2 bg-dark border">
				<h1 class="text-center text-white"> Right </h1>
			</div>
		</div>

		<div class="row bg-dark">
			<h1 class="text-center text-white"> Footer </h1>
		</div>
	</div>
</body>
</html>
