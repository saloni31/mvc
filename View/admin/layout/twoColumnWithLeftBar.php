<!DOCTYPE html>
<html>
<?=$this->createBlock("Block\Core\Layout\head")->toHtml();?>

<body class="d-flex flex-column min-vh-100">
	<!-- <div class="container"> -->
		<div class="row">
			<?php $this->validateLogin();?>
			<?php echo $this->getChild('header')->toHtml(); ?>
		</div>

		<div class="row">
			<div class="col-sm-2 border">
				<?php echo $this->getChild('sidebar')->toHtml(); ?>
			</div>

			<div class="col-sm-10">
				<div id="message">
					<?php echo $this->createBlock("Block\Core\Layout\message")->toHtml(); ?>
				</div>

				<?php echo $this->getChild('content')->toHtml(); ?>
			</div>

		</div>

		<div class="row mt-auto">
			<?php echo $this->getChild('footer')->toHtml(); ?>
		</div>
	<!-- </div> -->

<script>
$(document).ready( function () {
   	$('#myTable').DataTable();
} );
</script>

<script>
var mage = new Base();
</script>
</body>
</html>
