<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.21237800 1305290980";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"/home/kubiq/php/lpstore/app/templates/@layout.latte";i:2;i:1305290959;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/@layout.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'y40w4ao6mm'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb2cce1a32c7_head')) { function _lb2cce1a32c7_head($_l, $_args) { extract($_args)
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

<!--		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtmlComment($basePath) ?>/css/screen.css" type="text/css">-->
		<link href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/brownstone.css" media="screen,projection,tv" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($baseUri) ?>/css/jquery.autocomplete.css" type="text/css" />
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.12.custom.css" rel="stylesheet" />	
<!--	jQuery 	-->
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-1.5.1.min.js" type="text/javascript"></script>
<!--	jQuery UI	-->
		<script type="text/javascript" src="js/jquery-ui-1.8.12.custom.min.js"></script>

<!--nette ajax formulare-->
		<script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/netteForms.js"></script>
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.ajaxform.js" type="text/javascript"></script>
		<script src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.nette.js" type="text/javascript"></script>
		<script>
			//ajax formulare
			$(function () {
				// odeslání na formulářích
				$("form").submit(function () {
					$(this).ajaxSubmit();
					return false;
				});

				// odeslání pomocí tlačítek
				$("form :submit").click(function () {
					$(this).ajaxSubmit();
					return false;
				});
			});
		</script>
	<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

	</head>

	<body>
<!--	<body onload="CCPEVE.requestTrust('<?php echo Nette\Templates\TemplateHelpers::escapeHtmlComment($control->link("this")) ?>')">-->
		<div id="wrapper">
			<div id="page">
				<div id="page-bgtop">
					<div id="page-bgbtm">
						<div id="content"><?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($flashes) as $flash): ?>
							<div class="flash <?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;Nette\Templates\LatteMacros::callBlock($_l, 'content', $template->getParams()) ?>
						</div>
						<!-- end #content -->
						<div id="sidebar">
							<div id="logo">
								<h1><a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Item:")) ?>">Eve lp store</a></h1>
								<p>Offline lp store db.</p>
							</div>
							<div id="menu">
								<ul>
									<li class="current_page_item"><a href="#">Home</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Photos</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Links</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
							
<!--							<button type="button" onclick="CCPEVE.requestTrust('<?php echo Nette\Templates\TemplateHelpers::escapeHtmlComment($control->link("this")) ?>')">Request Trust</button>-->
							<ul>
								<li>
									<div id="search" >
										<form method="get" action="#">
											<div>
												<input type="text" name="s" id="search-text" value="" />
												<input type="submit" id="search-submit" value="GO" />
											</div>
										</form>
									</div>
									<div style="clear: both;">&nbsp;</div>
								</li>
								<li>
								<h2>Aliquam tempus</h2>
								<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
								</li>
								<li>
								<h2>Categories</h2>
								<ul>
									<li><a href="#">Aliquam libero</a></li>
									<li><a href="#">Consectetuer adipiscing elit</a></li>
									<li><a href="#">Metus aliquam pellentesque</a></li>
									<li><a href="#">Suspendisse iaculis mauris</a></li>
									<li><a href="#">Urnanet non molestie semper</a></li>
									<li><a href="#">Proin gravida orci porttitor</a></li>
								</ul>
								</li>
								
							</ul>
						</div>
						<!-- end #sidebar -->
						<div style="clear: both;">&nbsp;</div>
					</div>
				</div>
			</div>
			<!-- end #page -->
		</div>

	</body>
</html><?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
