<!DOCTYPE html>
<html>
<?=$this->createBlock("Block\Core\Layout\head")->toHtml();?>
<body class="d-flex flex-column min-vh-100">

		<div class="row text-center mb-2 row-header">

		</div>

		<div class="row mb-2">
			<div id="message" class="mr-5"></div>
			<div> <?php echo $this->getChild("content")->toHtml(); ?> </div>
		</div>

		<div class="row mt-auto">

		</div>

</body>

<script>
var mage = new Base();
</script>

</html>
