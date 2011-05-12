<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.21147600 1305204574";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"/home/kubiq/php/lpstore/app/templates/@layout.latte";i:2;i:1305204525;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/@layout.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '3s2tlpggan'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb7de9942c3f_head')) { function _lb7de9942c3f_head($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta name="description" content="Nette Framework web application skeleton" /><?php if (isset($robots)): ?>
		<meta name="robots" content="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($robots) ?>" />
<?php endif ?>

		<title>Eve Lp Store</title>

		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/screen.css" type="text/css" />
		<link rel="shortcut icon" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/css/jquery.autocomplete.css" type="text/css" />
		<link type="text/css" href="css/dot-luv/jquery-ui-1.8.12.custom.css" rel="stylesheet" />	
<!--	jQuery 	-->
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-1.5.1.min.js" type="text/javascript"></script>
<!--	jQuery UI	-->
		<script type="text/javascript" src="js/jquery-ui-1.8.12.custom.min.js"></script>

<!--nette ajax formulare-->
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.ajaxform.js" type="text/javascript"></script>
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.nette.js" type="text/javascript"></script>
		
		

	<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

	</head>
	
	<body>
		<div id="wrapper">
			<div id="header">
				<table id="head-table">
					<tr>
						<td>
					<h1><a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Item:")) ?>">Eve lp store</a></h1>
					<h2>Ofline lp store db.</h2>
					</td>
					<td class="right-align">

											</td>
					</tr>
				</table>


				<hr />


			</div><?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($flashes) as $flash): ?>
			<div class="flash <?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			<div>
<?php Nette\Templates\LatteMacros::callBlock($_l, 'content', $template->getParams()) ?>
			</div>
		</div>

	</body>
</html><?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
