<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.12344000 1305390611";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"/home/kubiq/php/lpstore/app/templates/Item/default.latte";i:2;i:1305305043;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"539fdec released on 2011-04-13";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/default.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'cm71o03dth'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb71eed0244a_head')) { function _lb71eed0244a_head($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lb793fbbc5d0_content')) { function _lb793fbbc5d0_content($_l, $_args) { extract($_args)
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
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); }  if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
