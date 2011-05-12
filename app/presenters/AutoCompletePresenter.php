<?php


/**
 * AutoCompletePresenter
 * this class handles automplete helper
 *
 * @author kubiq
 */
class AutoCompletePresenter extends BasePresenter {

	public function handleAutoComplete($text) {
		$this->payload->autoComplete = array();

		$text = trim($text);
		if ($text !== '') {
			// načteme seznam států (pro jednoduchost ze souboru)
			$list = $this->itemModel->getItems($text);

			// vytvoříme seznam pro našeptávač
			foreach ($list as $item) {
				
				if (strncasecmp($item->typeName, $text, strlen($text)) === 0) {
					$this->payload->autoComplete[] = $item;
				}
			}
		}

		// činnost presenteru tímto můžeme ukončit
		$this->terminate();
	}

}

