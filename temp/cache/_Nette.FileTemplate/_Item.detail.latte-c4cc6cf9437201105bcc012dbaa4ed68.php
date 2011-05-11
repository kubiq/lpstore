<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.42074300 1298163359";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"/home/kubiq/php/lpstore/app/templates/Item/detail.latte";i:2;i:1298163358;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/detail.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'ylawjg5kn3'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf9275b3320_content')) { function _lbf9275b3320_content($_l, $_args) { extract($_args)
?>

<h2><?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeName) ?></h2>
<div>

	<table>

		<tbody>

			<tr>
				<td>
<?php if ($item->description): ?>
						<?php echo $item->description ?>

<?php else: ?>
						There is no description.
<?php endif ?>
				</td>
				<td class="right-align">
					<?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($item->price)) ?>

				</td>
				<td><?php $_ctrl = $control->getWidget("changePriceForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></td>
			</tr>

		</tbody>
	</table>

</div>

<?php if ($transactions): ?>
<a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">Add new transaction</a>
<table>
	<thead>
		<tr>
			<th>Loyality Points</th>
			<th>Isk</th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($transactions) as $trans): ?>
		<tr>
			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->lp($trans->lp)) ?></td>

			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->isk)) ?></td>
			<td>
<?php if (isset($trans->items)): ?>
				<table>
<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($trans->items) as $item): ?>
					<tr>
						<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->quantity) ?></td>
						<td>x</td>
						<td><?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeName) ?></td>
						<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($item->price)) ?></td>
						
					</tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
				</table>
<?php else: ?>
					None items are required
<?php endif ?>
			</td>
		</tr>
		<tr>
			
			<td>Bulk</td>
			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($trans->bulk) ?> items</td>
			<td></td>
		</tr>
		<tr>
			
			<td>Market sell price for bulk</td>
			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->marketPrice)) ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Costs</td>
			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->itemsPrice)) ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Earnings</td>
			<td class="right-align"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->earnings)) ?></td>
			<td>/ <?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->lp($trans->lp)) ?> = <?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->earnings/$trans->lp)) ?> for 1 LP</td>
		</tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

	</tbody>
</table>

<?php else: ?>
	There are no transactions in db. But you can <a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">Add one.</a>

<?php endif ?>
<pre>
<?php //print_r ($xml) ?>
</pre>
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
if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
