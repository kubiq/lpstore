<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.29540800 1305752062";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"/home/kubiq/php/lpstore/libs/VisualPaginator/template.phtml";i:2;i:1305384540;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"289e719 released on 2011-05-17";}}}?><?php

// source file: /home/kubiq/php/lpstore/libs/VisualPaginator/template.phtml

?><?php
$_l = Nette\Latte\DefaultMacros::initRuntime($template, NULL, '44pjy7hj9j'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Latte\DefaultMacros::renderSnippets($control, $_l, get_defined_vars());
}
if ($paginator->pageCount > 1): ?>
<div class="paginator">
<?php if ($paginator->isFirst()): ?>
	<span class="button">« Previous</span>
<?php else: ?>
	<a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("this", array('page' => $paginator->page - 1))) ?>">« Previous</a>
<?php endif ?>

<?php foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($steps) as $step): if ($step == $paginator->page): ?>
		<span class="current"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($step, '') ?></span>
<?php else: ?>
		<a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("this", array('page' => $step))) ?>"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($step, '') ?></a>
<?php endif ?>
	<?php if ($iterator->nextValue > $step + 1): ?><span>…</span><?php endif ?>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if ($paginator->isLast()): ?>
	<span class="button">Next »</span>
<?php else: ?>
	<a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("this", array('page' => $paginator->page + 1))) ?>">Next »</a>
<?php endif ?>
</div>
<?php endif ;