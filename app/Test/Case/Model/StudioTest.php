<?php
App::uses('Studio', 'Model');

/**
 * Studio Test Case
 */
class StudioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.studio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Studio = ClassRegistry::init('Studio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Studio);

		parent::tearDown();
	}

/**
 * testGetStudioNames method
 *
 * @return void
 */

 public function testGetStudioNamesUneLettreExistante() {
        
        $nomTrouve = $this->Studio->getStudioNames('W');
        
        $this->assertCount(2, $nomTrouve);
        
    }

    public function testGetStudioNamesDeuxLettreExistante() {
        $nomTrouve = $this->Studio->getStudioNames('MG');
        
        $this->assertCount(1, $nomTrouve);
    }

    public function testGetStudioNamesUneLettreInexistante() {
        $nomTrouve = $this->Studio->getStudioNames('E');
        
        $this->assertCount(0, $nomTrouve);
    }

    public function testGetStudioNamesParamNull() {
        $nomTrouve = $this->Studio->getStudioNames('');
        
        $this->assertFalse($nomTrouve);
    }

}
