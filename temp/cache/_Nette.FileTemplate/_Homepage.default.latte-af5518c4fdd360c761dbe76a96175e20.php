<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.35345600 1297413870";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/home/kubiq/php/lpstore/app/templates/Homepage/default.latte";i:2;i:1297413868;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Homepage/default.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '38i5bfceai'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf8f833461f_content')) { function _lbf8f833461f_content($_l, $_args) { extract($_args)
?>
<div id="wrapper">
	<div id="logo"></div>

	<h1>Eve Lp Store</h1>

	<h2>lkskjdfd.</h2>

	<hr />

	<h2>Enter in the search box what you need to check</h2>

<?php $_ctrl = $control->getWidget("searchForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php
}}


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbf4e36e873d_head')) { function _lbf4e36e873d_head($_l, $_args) { extract($_args)
?>
<style>
	html {
		font: 16px/1.5 sans-serif;
		border-top: 8.7em solid #F4EBDB;
	}

	body {
		font: inherit;
		border-top: 5px solid #E4DED5;
		margin: 0;
		background: white;
		color: #333;
	}

	#wrapper {
		max-width: 670px;
		margin: -8.7em auto 0;
	}

	#logo {
		position: absolute;
		width: 150px;
		height: 8.7em;
		top: 0;
		right: 3em;
		background: url('data:image/gif;base64,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') right center no-repeat;
	}

	h1 {
		font-size: 47px;
		color: #3484D2;
		margin: .4em 0 -.3em;
		text-shadow: 1px 1px 0 white;
	}

	h2, h3 {
		font-size: 18px;
		color: #7A7772;
		margin: .6em 0;
		text-shadow: 1px 1px 0 white;
	}

	h3 {
		font-size: 16px;
		color: #3484D2;
	}

	ol {
		margin: 0;
		padding: 0;
	}

	ol li {
		margin: 1em 0;
	}

	ol li p {
		font-size: 90%;
	}

	code {
		color: #666;
	}

	hr {
		visibility: hidden;
		height: 2em;
	}

	img {
		border: none;
	}

	a {
		color: #3484D2;
		padding: 3px 1px;
		font-weight: bold;
	}

	a:hover, a:active, a:focus {
		background-color: #3484D2;
		text-decoration: none;
		color: white;
	}

	#environment {
		font-size: 70%;
		margin: 3em 0;
		padding: 1em 0;
		border-top: 1px solid #EEE;
		list-style: none;
		color: gray;
	}
</style>
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


<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}