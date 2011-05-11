<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.40290400 1297698071";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/home/kubiq/php/lpstore/app/templates/Transaction/add.latte";i:2;i:1297698069;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Transaction/add.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '1l2bnsoxjh'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb76b073c857_content')) { function _lb76b073c857_content($_l, $_args) { extract($_args)
?>

<?php $_ctrl = $control->getWidget("transactionForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
		
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
?>


<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
