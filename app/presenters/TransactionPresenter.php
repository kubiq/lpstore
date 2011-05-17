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
use \Transaction;
use \Requirement;

/**
 * Homepage presenter.
 *
 * @author     Kubiq
 * @package    LpStore
 */
class TransactionPresenter extends BasePresenter {

	/**
	 * Current item
	 * @var Item 
	 */
	private $item;
	/**
	 * Add transaction to item
	 * @param string $name 
	 */
	public function actionAdd($name = null) {
		if ( ! $name) {
			$this->redirect("Item:");
		}
		if ( ! $this->item = $this->itemModel->getItemByName($name)) {
			$this->redirect("Item:");
		}
	}

	public function renderAdd($name = null) {

		$this->template->item = $this->item;
	}
	/**
	 * Edit transaction to item
	 * @param string $name 
	 */
	public function actionEdit($name = null) {
		if (!(bool) $name) {
			$this->redirect("Item:");
		}
		if (!(bool) $this->itemModel->getItemByName($name)) {
			$this->redirect("Item:");
		}
	}

	public function renderEdit($name = null) {

		$this->template->item = $this->itemModel->getItemByName($name);
	}

	public function createComponentTransactionForm() {

		$form = new AppForm;

		$renderer = $form->getRenderer();
		$renderer->wrappers['form']['errors'] = FALSE;
		$renderer->wrappers['error']['container'] = NULL;
		$renderer->wrappers['error']['item'] = "span class=error";
		$renderer->wrappers['control']['errors'] = TRUE;
		$renderer->wrappers['label']['errors'] = NULL;
		
		$form->addHidden('name', $this->getParam('name'));

		$form->addText('isk', 'Isk price:')
			->addRule(AppForm::FILLED, 'Fill out price pls!')
			->addRule(AppForm::NUMERIC, 'Isk is number!')
			->addRule(AppForm::RANGE, 'Cant fill price under zero!', array(0, 10000000000));

		$form->addText('lp', 'Loyaty points:')
			->addRule(AppForm::FILLED, 'Fill out loyaty points pls!')
			->addRule(AppForm::NUMERIC, 'LP is number!')
			->addRule(AppForm::RANGE, 'LPs cant b under under zero!', array(0, 10000000000));
		
		$form->addText('bulk', 'Bulk:')
			->addRule(AppForm::FILLED, 'Fill out amount of things you get pls!')
			->addRule(AppForm::NUMERIC, 'Bulk is number!')
			->setDefaultValue(1)
			->addRule(AppForm::RANGE, 'Bulk cant get under one!', array(1, 10000000000));

		$form->addText('item1', "Item 1")
			->setHtmlId('item1');
		$form->addText('q1', 'Quantity:')
			->setDefaultValue(0)
			->setHtmlId('q1')
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addText('item2', "Item 2")
			->setHtmlId('item2');
		$form->addText('q2', 'Quantity:')
			->setDefaultValue(0)
			->setHtmlId('q2')
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addText('item3', "Item 3")
			->setHtmlId('item3');
		$form->addText('q3', 'Quantity:')
			->setDefaultValue(0)
			->setHtmlId('q3')
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addText('item4', "Item 4")
			->setHtmlId('item4');
		$form->addText('q4', 'Quantity:')
			->setDefaultValue(0)
			->setHtmlId('q4')
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addText('item5', "Item 5")
			->setHtmlId('item5');
		$form->addText('q5', 'Quantity:')
			->setDefaultValue(0)
			->setHtmlId('q5')
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addText('corp', "Corporation:")
			->addRule(AppForm::FILLED,"Select corporation please.")
			->setHtmlId('corp');
		
		$form['item1']	->addCondition(AppForm::FILLED)
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item2'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item3'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item4'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item5']);
		
		$form['item2']	->addCondition(AppForm::FILLED)
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item1'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item3'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item4'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item5']);
		
		$form['item3']	->addCondition(AppForm::FILLED)
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item2'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item1'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item4'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item5']);
		
		$form['item4']	->addCondition(AppForm::FILLED)
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item2'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item3'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item1'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item5']);
		
		$form['item5']	->addCondition(AppForm::FILLED)
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item2'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item3'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item4'])
				->addRule(~AppForm::EQUAL, "You can't have duplicities!", $form['item1']);
		
		$form['item1']->getControlPrototype()->setSize(50);
		$form['item2']->getControlPrototype()->setSize(50);
		$form['item3']->getControlPrototype()->setSize(50);
		$form['item4']->getControlPrototype()->setSize(50);
		$form['item5']->getControlPrototype()->setSize(50);
		$form['corp']->getControlPrototype()->setSize(50);
		
		$form->addProtection("security protection alert...try refresh page");

		$form->addSubmit('s', 'Add deal');

		$form->onSubmit[] = callback($this, 'transFormSubmitted');

		return $form;
	}

	public function transFormSubmitted(Form $form) {

		$values = $form->getValues();

		$typeID = $this->itemModel->getItemByName($values['name'])->typeID;

		if (!(bool) $typeID) {
			throw new InvalidStateException("Item not found");
		}

		//transakce
		$t = new Transaction();
		$t->isk = $values['isk'];
		$t->lp = $values['lp'];
		$t->itemID = $typeID;
		$t->bulk = $values['bulk'];
		
		$corp = $this->corporationModel->getCorpByName($values['corp']);
		
		$t->corp = $corp->corporationID;

		$insertID = $this->transactionModel->createTransaction($t);
		
		
		//jednotlive itemy
		$reqCount = 5;
		for ($idx = 1; $idx <= $reqCount; $idx++) {
			
			//pokud je u itemu nula preskoci se
			if (!(bool) $values['q'.$idx]) {
				continue;
			}
			//kontrola jestli je item v db
			$typeID = $this->itemModel->getItemByName($values['item'.$idx]);
			if (!(bool) $typeID) {
				throw new InvalidStateException("Item not found");
			}
			$req = new Requirement();
			$req->typeID = $typeID->typeID;
			$req->quantity = $values['q'.$idx];
			$req->transactionID = $insertID;
			
			$this->reqModel->createRequirement($req);
		}

		$this->flashMessage("Transaction has been added");
		$this->redirect("Item:detail", array('name' => $values['name']));
	}

	public function handleAutoComplete($term) {
		$this->payload->autoComplete = array();

		$term = trim($term);
		if ($term !== '') {
			$list = $this->itemModel->getAllForAC($term);
			
			$json = new JsonResponse($list);
			
			$this->sendResponse($json);	
		}
		// činnost presenteru tímto můžeme ukončit
		$this->terminate();
	}
	
	public function handleAutoCompleteCorp($term) {
		$this->payload->autoComplete = array();

		$term = trim($term);
		if ($term !== '') {
			$list = $this->corporationModel->getAllForAC($term);
			
			$json = new JsonResponse($list);
			
			$this->sendResponse($json);	
		}
		// činnost presenteru tímto můžeme ukončit
		$this->terminate();
	}
}
