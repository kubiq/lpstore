<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.47910500 1297641743";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"/home/kubiq/php/lpstore/app/templates/Error/404.latte";i:2;i:1297014394;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Error/404.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'yeo02vuxfs'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0eeacd859d_content')) { function _lb0eeacd859d_content($_l, $_args) { extract($_args)
?>

<h1>Page Not Found</h1>

<p>The page you requested could not be found. It is possible that the address is
incorrect, or that the page no longer exists. Please use a search engine to find
what you are looking for.</p>

<p><small>error 404</small></p>
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
