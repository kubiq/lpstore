<?php

/**
 * LpStore
 *
 * @copyright  Copyright (c) 2011 Kubiq
 * @package    LpStore
 */

use Nette\Application\AppForm;
use Nette\Application\JsonResponse;

/**
 * Base class for all application presenters.
 *
 * @author     Kubiq
 * @package    LpStore
 */
abstract class BasePresenter extends Nette\Application\Presenter {

	/**
	 * ItemModel instance
	 * @var ItemModel 
	 */
	protected $itemModel;
	/**
	 * TransactionModel instance
	 * @var TransactionModel 
	 */
	protected $transactionModel;
	/**
	 * RequirementModel instance
	 * @var RequirementModel 
	 */
	protected $reqModel;
	/**
	 * EveCentralModel instance
	 * @var EveCentralModel
	 */
	protected $eveCentralModel;
	/**
	 * Corporations instance
	 * @var CorporationModel
	 */
	protected $corporationModel;
	/**
	 * @var array Items matched for current query 
	 */
	protected $matches;

	protected function startup() {
		parent::startup();

		$this->itemModel = new ItemModel();
		$this->transactionModel = new TransactionModel();
		$this->reqModel = new RequirementModel();
		$this->eveCentralModel = new EveCentralModel();
		$this->corporationModel = new CorporationModel();

		AppForm::extensionMethod('addSuggestInput', 'SuggestInput::addSuggestInput');
	}

	protected function createComponentDibiSuggester() {
		$suggester = new DibiSuggester();
		return $suggester
			->setTable('invTypes')
			->setColumn('typeName')
			->setWhere('[published] = 1 and [typeName] LIKE %s
				ORDER BY typeName');
	}

	protected function createTemplate() {
		$template = parent::createTemplate();
		
		//helper pro formatovani meny
		$template->registerHelper('isk', 'Helpers::isk');
		$template->registerHelper('lp', 'Helpers::lp');

		
		
		return $template;
	}

	public function actionSuggestDibi($typedText = '') {
		$this->matches = $this['dibiSuggester']->getSuggestions($typedText);
	}

	public function renderSuggestDibi() {
		$this->sendResponse(new JsonResponse($this->matches));
	}
	
	/**
	 * Search form component factory.
	 * @return Nette\Application\AppForm
	 */
	public function createComponentSearchForm() {
		$form = new AppForm;

		$form->addText('q', 'Item:')
			->setHtmlId('hledat')
			->addRule(AppForm::MIN_LENGTH, 'You have fill at least 3 characters.', 3);

		$form['q']->getControlPrototype()->setSize(50);
		
		$form->addSubmit('search', 'Search');

		$form->onSubmit[] = callback($this, 'searchFormSubmitted');

		return $form;
	}

	public function searchFormSubmitted(AppForm $form) {

		$values = $form->getValues();
		$this->redirect("Item:search", array('q' => $values['q']));
	}
	
	/**
	 * Search form component factory.
	 * @return Nette\Application\AppForm
	 */
	public function createComponentChangePriceForm() {
		$form = new AppForm;

		$typeName = $this->getParam('name');

		$form->addText('price', 'New price:')
			->setDefaultValue(0)
			->addRule(AppForm::FILLED, 'Enter number pls!')
			->addRule(AppForm::NUMERIC, 'Enter number pls!')
			->addRule(AppForm::RANGE, 'Price cant be negative!',array(0,100000000000));

		$form->addHidden('name', $typeName);
		
		$form->addSubmit('change', 'change');

		$form->onSubmit[] = callback($this, 'changePriceFormSubmitted');

		return $form;
	}

	public function changePriceFormSubmitted(AppForm $form) {

		$values = $form->getValues();
		
		$this->itemModel->changePrice($values['name'], $values['price']);
		
		
		$this->flashMessage("Price has been changed!");
		$this->redirect("Item:detail", array('name' => $values['name']));
	}

	
}
