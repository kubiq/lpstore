<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.14707600 1298073792";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"/home/kubiq/php/lpstore/app/templates/Item/search.latte";i:2;i:1298073778;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/search.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '4cinew9t61'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbd6f6b0a66_content')) { function _lbbd6f6b0a66_content($_l, $_args) { extract($_args)
?>
<div>
	
<?php if ($items): ?>
	<h2>Your search results.</h2>
	<div>
		
		<table>
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Name of item
					</th>
					<th>
						Price in Jita
					</th>					
				</tr>
			</thead>
			<tbody>
<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($items) as $item): ?>
				<tr>
					<td class="right-align">
						<?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeID) ?>

					</td>
					<td>
						<a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Item:detail", array('name'=> $item->typeName))) ?>">
							<?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeName) ?>

						</a>
					</td>
					<td class="right-align">
						<?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($item->price)) ?>

					</td>
				</tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</tbody>
		</table>
		
	</div>
<?php else: ?>
	<div>
		<h2>Your query didn't returned any results</h2>
	</div>
<?php endif ?>
	<div>
<?php $_ctrl = $control->getWidget("vp"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
	</div>
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
