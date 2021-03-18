<!DOCTYPE html>
<html>
<?=$this->createBlock("Block\Core\Layout\head")->toHtml();?>
<body class="d-flex flex-column min-vh-100">

		<div class="row text-center mb-2 row-header">
			<?php echo $this->getChild("header")->toHtml(); ?>
			<!-- <h1 class="text-white"> </h1> -->
		</div>

		<div class="row mb-2">
			<div id="message"></div>

			<?php echo $this->getChild("content")->toHtml(); ?>
			<!-- <h1 class="text-center text-white"> Content </h1> -->
		</div>

		<div class="row mt-auto">
			<?php echo $this->getChild("footer")->toHtml(); ?>
			<!-- <h1 class="text-center text-white"> Footer </h1> -->
		</div>

</body>

<script>
var mage = new Base();
</script>

</html>
