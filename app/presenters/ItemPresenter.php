<?php

/**
 * LpStore
 *
 * @copyright  Copyright (c) 2011 Kubiq
 * @package    LpStore
 */
use Nette\Debug;
use Nette\Application\AppForm;
use Nette\Application\JsonResponse;

/**
 * Homepage presenter.
 *
 * @author     Kubiq
 * @package    LpStore
 */
class ItemPresenter extends BasePresenter {

	private $paginator;
	
	public function renderDefault($q = null) {
		if ((bool) $q) {
			$this->template->items = $this->itemModel->getItems($q, 20);
			
		}
	}

	/**
	 * Detail of one item
	 * @param type $name 
	 */
	public function actionDetail($name = null) {
		if (!(bool) $name) {
			$this->redirect("Item:default");
		}
	}

	public function renderDetail($name = null) {

		$this->template->item = $this->itemModel->getItemByName($name);
		
		$this->template->transactions = $this->transactionModel->getTransactions($this->template->item->typeID);
		Debug::barDump($this->template->transactions);
	}

	

	/**
	 * Search page
	 * @param string $q 
	 */ 
	public function actionSearch($q = null, $page = 1) {
		if (!(bool) $q) {
			$this->redirect("Item:");
		}
		
		$searchForm = $this['searchForm'];
		$searchForm->setDefaults(array('q' => $q));

		$vp = $this['vp'];
		$this->paginator = $vp->paginator;

		$this->paginator->itemsPerPage = 20;
		$this->paginator->itemCount = $this->itemModel->countSearch($q);
		
		if($this->paginator->itemCount == 1) {
			$item = $this->itemModel->getItems($q,0,1);
			Debug::barDump($item);
			$this->redirect("Item:detail", array('name'=> $item[0]->typeName));
		}
	}
	public function renderSearch($q = null, $page = 1) {

		

		$this->template->items = $this->itemModel->getItems($q, 
			$this->paginator->offset, 
			$this->paginator->itemsPerPage);
	}

	public function createComponentVp() {
		return new VisualPaginator;
	}

	

}
