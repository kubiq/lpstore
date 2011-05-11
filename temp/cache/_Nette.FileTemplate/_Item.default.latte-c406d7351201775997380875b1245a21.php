<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.01898700 1297698189";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/home/kubiq/php/lpstore/app/templates/Item/default.latte";i:2;i:1297698185;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/default.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'csvchb9vcd'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb56dd7a52b3_content')) { function _lb56dd7a52b3_content($_l, $_args) { extract($_args)
?>
<div>

	<h2>Enter in the search box what you need to check</h2>

<?php $_ctrl = $control->getWidget("searchForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
