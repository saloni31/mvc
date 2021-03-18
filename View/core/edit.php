<?=$this->getTabHtml();?>
<form id="form" action = "<?=$this->getFormUrl()?>" method="post" enctype="multipart/form-data">
<?php echo $this->getTabContent(); ?>
</form>