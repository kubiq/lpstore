<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.25407700 1305752062";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"/home/kubiq/php/lpstore/app/templates/Item/search.latte";i:2;i:1305305043;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"289e719 released on 2011-05-17";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/search.latte

?><?php
$_l = Nette\Latte\DefaultMacros::initRuntime($template, NULL, '2v0xpsrdv3'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbef9c8dd45e_content')) { function _lbef9c8dd45e_content($_l, $_args) { extract($_args)
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
<?php foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($items) as $item): ?>
				<tr>
					<td class="right-align">
						<?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeID, '') ?>

					</td>
					<td>
						<a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("Item:detail", array('name'=> $item->typeName))) ?>">
							<?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeName, '') ?>

						</a>
					</td>
					<td class="right-align">
						<?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($item->price), '') ?>

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
<?php $_ctrl = $control->getWidget("vp"); if ($_ctrl instanceof Nette\Application\UI\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
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
	return Nette\Latte\DefaultMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\DefaultMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
