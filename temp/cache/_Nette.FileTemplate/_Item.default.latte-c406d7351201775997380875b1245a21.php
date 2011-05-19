<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.27003500 1305632416";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/home/kubiq/php/lpstore/app/templates/Item/default.latte";i:2;i:1305305043;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"289e719 released on 2011-05-17";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/default.latte

?><?php
$_l = Nette\Latte\DefaultMacros::initRuntime($template, NULL, 'ovhdyjwu1a'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb46763fa215_head')) { function _lb46763fa215_head($_l, $_args) { extract($_args)
?>
<script>		
	$(function() {
		$( "#hledat" ).autocomplete({
			source: "?do=autoComplete",
			//source: ["aaaaaaa", "aaaaaaab", "aaaaaaac"],
			minLength: 3
			,
			select: function( event, ui ) {
				var url = document.location + '?name=' + ui.item.label + '&action=detail';    
				$(location).attr('href',url);
			}
		});
	});
</script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7a18e767f0_content')) { function _lb7a18e767f0_content($_l, $_args) { extract($_args)
?>
<div>

	<h2>Enter in the search box what you need to check</h2>

<?php $_ctrl = $control->getWidget("searchForm"); if ($_ctrl instanceof Nette\Application\UI\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Latte\DefaultMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); }  if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\DefaultMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
