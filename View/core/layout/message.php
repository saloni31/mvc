<?php
if ($success = $this->getAdminMessage()->getSuccess()):
	$this->getAdminMessage()->clearSuccess();?>

										<div class="alert alert-success alert-dismissible fade show mt-2 message" role="alert">
										  <strong><?=$success;?></strong>
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>


									<?php elseif ($failure = $this->getAdminMessage()->getFailure()):
	$this->getAdminMessage()->clearFailure();?>


										<div class="alert alert-danger alert-dismissible fade show mt-2 message" role="alert">
										  <strong><?=$failure;?></strong>
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>

									<?php elseif ($notice = $this->getAdminMessage()->getNotice()): ?>
<?php $this->getAdminMessage()->clearNotice();?>

	<div class="alert alert-warning alert-dismissible fade show mt-2 message" role="alert">
	  	<strong><?=$notice?></strong>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>

	<!-- </div> -->

<?php endif;?>

<script type="text/javascript">
	$('.message').delay(5000).fadeOut('slow');
</script>