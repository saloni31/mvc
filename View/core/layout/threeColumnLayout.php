<!DOCTYPE html>
<html>
<?=$this->createBlock("Block\Core\Layout\head")->toHtml();?>
<body class="d-flex flex-column min-vh-100">

		<div class="row">
			<h1 class="text-white"> Header </h1>
		</div>

		<div class="row">
			<div class="col-sm-2" style="height:525px">
				<h1 class="text-center text-white">  </h1>
			</div>

			<div class="col-sm-8 bg-dark border">
				<h1 class="text-center text-white"> Content </h1>
			</div>

			<div class="col-sm-2 bg-dark border">
				<h1 class="text-center text-white">  </h1>
			</div>
		</div>

		<div class="row bg-dark">
			<h1 class="text-center text-white">  </h1>
		</div>

</body>
</html>
