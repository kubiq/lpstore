<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.60600600 1305803051";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/home/kubiq/php/lpstore/app/templates/Transaction/add.latte";i:2;i:1305392137;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"289e719 released on 2011-05-17";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Transaction/add.latte

?><?php
$_l = Nette\Latte\DefaultMacros::initRuntime($template, NULL, '89sc66xryj'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbf30481741a_head')) { function _lbf30481741a_head($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lb1acba2aa16_content')) { function _lb1acba2aa16_content($_l, $_args) { extract($_args)
?>

<h2><?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeName, '') ?></h2>
<?php $_ctrl = $control->getWidget("transactionForm"); if ($_ctrl instanceof Nette\Application\UI\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Latte\DefaultMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\DefaultMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
