<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.63427100 1298208735";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"/home/kubiq/php/lpstore/app/templates/@layout.latte";i:2;i:1298208731;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/@layout.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '2sg3fmoy3z'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb7985d83a6e_head')) { function _lb7985d83a6e_head($_l, $_args) { extract($_args)
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
	<link rel="stylesheet" media="print" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/print.css" type="text/css" />
	<link rel="shortcut icon" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/favicon.ico" type="image/x-icon" />

	<script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/netteForms.js"></script>
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/css/suggest.css" type="text/css" />
	<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/js/jquery.dimensions.js" type="text/javascript"></script>
	<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/js/jquery.bgiframe.min.js" type="text/javascript"></script>
	<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/js/jquery.suggest.js" type="text/javascript"></script>
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
						
<?php $_ctrl = $control->getWidget("searchForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
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
</html>
<?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
