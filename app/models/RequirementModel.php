<?php


/**
 * Model managing Requirements for transaction
 *
 * @author kubiq
 */
class RequirementModel extends BaseModel {
	
	/**
	 * creates new Requirement
	 * @param Requirement $req
	 * @return bool
	 */
	public function createRequirement(Requirement $req) {
			
		return dibi::query('INSERT INTO [requirement]', (array) $req);
	}
	
}

