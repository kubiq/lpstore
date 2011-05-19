<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.62015700 1305807281";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"/home/kubiq/php/lpstore/app/templates/Item/detail.latte";i:2;i:1305807279;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"289e719 released on 2011-05-17";}}}?><?php

// source file: /home/kubiq/php/lpstore/app/templates/Item/detail.latte

?><?php
$_l = Nette\Latte\DefaultMacros::initRuntime($template, NULL, '9e8egvq7un'); unset($_extends);


//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb803d3f4f3d_head')) { function _lb803d3f4f3d_head($_l, $_args) { extract($_args)
?>
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
if (!function_exists($_l->blocks['content'][] = '_lb9aa81d1e10_content')) { function _lb9aa81d1e10_content($_l, $_args) { extract($_args)
?>

<a href="#" onclick="CCPEVE.showInfo(<?php echo Nette\Templating\DefaultHelpers::escapeHtmlJs($item->typeID, '"') ?>)"><h2 class="typeName"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeName, '') ?></h2></a>
<?php if ($item->categoryID == 6): ?>
	<img src="images/types/shiptypes_png/128_128/<?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeID, '"') ?>.png" class="shipImg" />
<?php endif ?>
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
					<?php echo Nette\Templating\DefaultHelpers::escapeHtmlComment($template->isk($item->price)) ?>

				</td>-->
				<td><a href="#" onclick="CCPEVE.showMarketDetails(<?php echo Nette\Templating\DefaultHelpers::escapeHtmlJs($item->typeID, '"') ?>)" class="marketInfo"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($item->price), '') ?></a><?php $_ctrl = $control->getWidget("changePriceForm"); if ($_ctrl instanceof Nette\Application\UI\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></td>
			</tr>

		</tbody>
	</table>

</div>

<?php if ($transactions): ?>
<a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">Add new transaction</a>

<div id="dealsList">
<?php foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($transactions) as $trans): ?>
	<a class="dealName" href="#section<?php echo Nette\Templating\DefaultHelpers::escapeHtml($iterator->getCounter(), '"') ?>">
		<h3 class="inline"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($trans->corp, '') ?></h3>
		<h4 class="lpPrice inline">(<?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->lpPrice), '') ?> for 1 LP)</h4>
	</a>
	
	<div><a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("delete!", array('id'=>$trans->id))) ?>">Delete</a>  
	<table>
		<tbody>
			<tr>
				<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->lp($trans->lp), '') ?></td>

				<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->isk), '') ?></td>
				<td>
<?php if (isset($trans->items)): ?>
					<table>
<?php foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($trans->items) as $item): ?>
						<tr>
							<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->quantity, '') ?></td>
							<td>x</td>
							<td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($item->typeName, '') ?></td>
							<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($item->price), '') ?></td>

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
				<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($trans->bulk, '') ?> items</td>
				<td></td>
			</tr>
			<tr>

				<td>Market sell price for bulk</td>
				<td class="right-align"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->marketPrice), '') ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Costs</td>
				<td class="right-align red"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->itemsPrice), '') ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Earnings</td>
				<td class="right-align green"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->earnings), '') ?></td>
<?php if ($trans->lp == 0): ?>
				<td>No lp required for this deal.</td>
<?php else: ?>
				<td>/ <?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->lp($trans->lp), '') ?> = <?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->isk($trans->earnings/$trans->lp), '') ?> for 1 LP</td>
<?php endif ?>
			</tr>
		</tbody>
	</table>
	</div>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>


<?php else: ?>
	There are no transactions in db. But you can <a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("Transaction:add", array('name'=>$item->typeName))) ?>">add one.</a>

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
	return Nette\Latte\DefaultMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\DefaultMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
