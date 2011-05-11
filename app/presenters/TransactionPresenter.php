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
	 * Add transaction to item
	 * @param string $name 
	 */
	public function actionAdd($name = null) {
		if (!(bool) $name) {
			$this->redirect("Item:");
		}
		if (!(bool) $this->itemModel->getItemByName($name)) {
			$this->redirect("Item:");
		}
	}

	public function renderAdd($name = null) {

		$this->template->item = $this->itemModel->getItemByName($name);
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

		$form->addSuggestInput('item1', "Item 1")
			->setSuggestLink($this->link('suggestDibi'));
		$form->addText('q1', 'Quantity:')
			 ->setDefaultValue(0)
			 ->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addSuggestInput('item2', "Item 2")
			->setSuggestLink($this->link('suggestDibi'));
		$form->addText('q2', 'Quantity:')
			->setDefaultValue(0)
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addSuggestInput('item3', "Item 3")
			->setSuggestLink($this->link('suggestDibi'));
		$form->addText('q3', 'Quantity:')
			->setDefaultValue(0)
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addSuggestInput('item4', "Item 4")
			->setSuggestLink($this->link('suggestDibi'));
		$form->addText('q4', 'Quantity:')
			->setDefaultValue(0)
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form->addSuggestInput('item5', "Item 5")
			->setSuggestLink($this->link('suggestDibi'));
		$form->addText('q5', 'Quantity:')
			->setDefaultValue(0)
			->addRule(AppForm::NUMERIC, 'Enter number pls!');

		$form['item1']->getControlPrototype()->setSize(50);
		$form['item2']->getControlPrototype()->setSize(50);
		$form['item3']->getControlPrototype()->setSize(50);
		$form['item4']->getControlPrototype()->setSize(50);
		$form['item5']->getControlPrototype()->setSize(50);
		
		$form->addProtection("security protection alert...try refresh page");

		$form->addSubmit('s', 'Add items');

		$form->onSubmit[] = callback($this, 'transFormSubmitted');

		return $form;
	}

	public function transFormSubmitted(AppForm $form) {

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

	public function actionSuggestDibi($typedText = '') {
		$this->matches = $this['dibiSuggester']->getSuggestions($typedText);
	}

	public function renderSuggestDibi() {
		$this->sendResponse(new JsonResponse($this->matches));
	}

}
