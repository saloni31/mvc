<ul class="nav nav-tabs font-weight-bold">
	<?php $tabs = $this->getTabs();

foreach ($tabs as $key => $value): ?>
		<li class="nav-item">
			<a class="nav-link text-dark" onclick = "mage.resetParams().setUrl('<?php echo $tabs[$key]['url'] ?>').load()" href = "javascript:void(0);">
				<?=$tabs[$key]['label']?>
			</a>
		</li>
	<?php endforeach;?>
</ul>