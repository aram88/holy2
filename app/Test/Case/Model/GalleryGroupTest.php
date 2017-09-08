<?php
App::uses('GalleryGroup', 'Model');

/**
 * GalleryGroup Test Case
 *
 */
class GalleryGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.gallery_group', 'app.gallery');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GalleryGroup = ClassRegistry::init('GalleryGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GalleryGroup);

		parent::tearDown();
	}

}
?>