<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.07943100 1305293826";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"/home/kubiq/php/lpstore/app/templates/Item/detail.latte";i:2;i:1305293823;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"bb2b723 released on 2011-02-06";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/detail.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '2oog8hgzbc'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lba442eb7750_head')) { function _lba442eb7750_head($_l, $_args) { extract($_args)
?>
<style>
#dealsList a.dealName {
	cursor:pointer;
	display:block;
	margin-top: 0;
	text-decoration: none;
	outline:0;
	clear: both;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.dealName').click(function() {
		$(this).next().toggle();
		return false;
	}).next().hide();
});
</script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7f18640668_content')) { function _lb7f18640668_content($_l, $_args) { extract($_args)
?>

<a href="#" onclick="CCPEVE.showInfo(<?php echo Nette\Templates\TemplateHelpers::escapeHtmlJs($item->typeID) ?>)"><h2 class="typeName"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($item->typeName) ?></h2></a>
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
<!--				<td class="right-align">
					<?php echo Nette\Templates\TemplateHelpers::escapeHtmlComment($template->isk($item->price)) ?>

				</td>-->
				<td><a href="#" onclick="CCPEVE.showMarketDetails(<?php echo Nette\Templates\TemplateHelpers::escapeHtmlJs($item->typeID) ?>)" class="marketInfo"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($item->price)) ?></a><?php $_ctrl = $control->getWidget("changePriceForm"); if ($_ctrl instanceof Nette\Application\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></td>
			</tr>

		</tbody>
	</table>

</div>

<?php if ($transactions): ?>
<a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">Add new transaction</a>

<div id="dealsList">
<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($transactions) as $trans): ?>
	<a class="dealName" href="#section<?php echo Nette\Templates\TemplateHelpers::escapeHtml($iterator->getCounter()) ?>"><h3><?php echo Nette\Templates\TemplateHelpers::escapeHtml($trans->corp) ?></h3></a>
	<div>
	<table>
		<tbody>
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
				<td class="right-align red"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->itemsPrice)) ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Earnings</td>
				<td class="right-align green"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->earnings)) ?></td>
<?php if ($trans->lp == 0): ?>
				<td>No lp required for this deal.</td>
<?php else: ?>
				<td>/ <?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->lp($trans->lp)) ?> = <?php echo Nette\Templates\TemplateHelpers::escapeHtml($template->isk($trans->earnings/$trans->lp)) ?> for 1 LP</td>
<?php endif ?>
			</tr>
		</tbody>
	</table>
	</div>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>


<?php else: ?>
	There are no transactions in db. But you can <a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">add one.</a>

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
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
