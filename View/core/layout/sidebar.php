<ul class="list-group list-group-flush font-weight-bold">
	<li class="list-group-item">
		<a class="text-dark" href = "<?php echo $this->getUrl('index', 'admin_index', null, true) ?>" >
			<i class="fa fa-home mr-2"></i>Home
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_admin', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-user mr-2"></i>Admin
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_customer', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-user mr-2"></i> Customer
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_customerGroup', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-users mr-2"></i>Customer Group
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_product', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-product-hunt mr-2"></i>Products
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_category', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-tag mr-2"></i>Categories
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_attribute', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-tasks mr-2"></i> Attributes
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_CmsPage', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-sticky-note mr-2"></i>CMS Page
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_paymentMethod', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-credit-card-alt mr-2"></i>Payments
		</a>
	</li>

	<li class="list-group-item">
		<a class="text-dark" onclick = "mage.resetParams().setUrl('<?php echo $this->getUrl('grid', 'admin_shippingMethod', null, true) ?>').load();" href = "javascript:void(0);">
			<i class="fa fa-truck mr-2"></i>Shipping
		</a>
	</li>
</ul>