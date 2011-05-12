<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.51471700 1305186681";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"/home/kubiq/php/lpstore/app/templates/Error/403.latte";i:2;i:1297014394;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Error/403.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'l0gktzt565'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb238e147639_content')) { function _lb238e147639_content($_l, $_args) { extract($_args)
?>

<h1>Access Denied</h1>

<p>You do not have permission to view this page. Please try contact the web
site administrator if you believe you should be able to view this page.</p>

<p><small>error 403</small></p>
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
$robots = 'noindex' ;if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
