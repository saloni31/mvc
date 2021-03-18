<?php
namespace Block\Admin\CmsPage;

class Edit extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	function __construct() {
		$this->setTemplate("./View/admin/cms_page/Edit.php");
	}
}