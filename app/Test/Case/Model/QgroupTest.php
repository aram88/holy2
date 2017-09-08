<?php
App::uses('Qgroup', 'Model');

/**
 * Qgroup Test Case
 *
 */
class QgroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.qgroup', 'app.question');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Qgroup = ClassRegistry::init('Qgroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Qgroup);

		parent::tearDown();
	}

}
?>