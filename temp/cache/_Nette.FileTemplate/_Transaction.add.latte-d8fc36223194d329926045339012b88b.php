<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.78316100 1305392145";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/home/kubiq/php/lpstore/app/templates/Transaction/add.latte";i:2;i:1305392137;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"539fdec released on 2011-04-13";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Transaction/add.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'fu4e60yc5b'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbefc24a1226_head')) { function _lbefc24a1226_head($_l, $_args) { extract($_args)
?>
<script>
	$(function() {	$( "#item1" ).autocomplete({ source: "?do=autoComplete", select: function(event, ui) { $('#q1').val('1'); }, minLength: 3}); });
	$(function() {	$( "#item2" ).autocomplete({ source: "?do=autoComplete", select: function(event, ui) { $('#q2').val('1'); }, minLength: 3});	});
	$(function() {	$( "#item3" ).autocomplete({ source: "?do=autoComplete", select: function(event, ui) { $('#q3').val('1'); }, minLength: 3});	});
	$(function() {	$( "#item4" ).autocomplete({ source: "?do=autoComplete", select: function(event, ui) { $('#q4').val('1'); }, minLength: 3});	});
	$(function() {	$( "#item5" ).autocomplete({ source: "?do=autoComplete", select: function(event, ui) { $('#q5').val('1'); }, minLength: 3});	});
	$(function() {	$( "#corp" ).autocomplete({ source: "?do=autoCompleteCorp&presenter=Transaction",	minLength: 3});	});
</script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbec97ee5abd_content')) { function _lbec97ee5abd_content($_l, $_args) { extract($_args)
?>

<h2><?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeName) ?></h2>
<?php $_ctrl = $control->getWidget("transactionForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
