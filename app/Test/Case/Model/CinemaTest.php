<?php

class CinemaTest extends CakeTestCase {

    public $fixtures = array(
        'app.cinema',
        'app.user'
    );

    public function setUp() {
        parent::setUp();

        // Load Contact Model
        $this->Cinema = ClassRegistry::init('Cinema');
    }

    public function tearDown() {
        parent::tearDown();

        // Remove all form submissions
        $this->Cinema->query('TRUNCATE TABLE cinemas;');
        // Remove Uploaded file
        @unlink(WWW_ROOT . 'uploads' . DS . 'TestFile.jpg');
    }

    public function testIsOwnedByAutreUser() {
//        $data = array('Cinema' => array(
//                'id' => '1',
//                'name' => 'Prout',
//                'society' => 'Moldu',
//                'phone' => '4445556666',
//                'user_id' => '1'
//        ));
//        $result = $this->Cinema->save($data);
//        $this->assertArrayHasKey('Cinema', $result);

        $isOwned = $this->Cinema->isOwnedBy(2, 1);

        $this->assertFalse($isOwned);
    }

    public function testIsOwnedByAutreCinema() {
//        $data = array('Cinema' => array(
//                'id' => '2',
//                'name' => 'Prout',
//                'society' => 'Moldu',
//                'phone' => '4445556666',
//                'user_id' => '1'
//        ));
//        $result = $this->Cinema->save($data);
//        $this->assertArrayHasKey('Cinema', $result);

        $isOwned = $this->Cinema->isOwnedBy(1, 2);

        $this->assertFalse($isOwned);
    }

    public function testIsOwnedByPossedeCinema() {
//        $data = array('Cinema' => array(
//                'id' => '1',
//                'name' => 'Prout',
//                'society' => 'Moldu',
//                'phone' => '4445556666',
//                'user_id' => '1'
//        ));
//        $result = $this->Cinema->save($data);
//        $this->assertArrayHasKey('Cinema', $result);

        $isOwned = $this->Cinema->isOwnedBy(1, 1);

        $this->assertTrue($isOwned);
    }

    public function testInvalideTelephone() {
        $data = array('Cinema' => array(
                'id' => '1',
                'name' => 'Prout',
                'society' => 'Moldu',
                'phone' => 'a445556666',
                'user_id' => '1'
        ));
        $result = $this->Cinema->save($data);

        $this->assertFalse($result);
    }

    public function testValideTelephoneColle() {
        $data = array('Cinema' => array(
                'id' => '1',
                'name' => 'Prout',
                'society' => 'Moldu',
                'phone' => '4445556666',
                'user_id' => '1'
        ));
        
        $result = $this->Cinema->save($data);
        $this->assertArrayHasKey('Cinema', $result);

        // Get the count in the DB
        $result = $this->Cinema->find('count', array(
            'conditions' => array(
                'Cinema.id' => '1',
                'Cinema.name' => 'Prout',
                'Cinema.society' => 'Moldu',
                'Cinema.phone' => '4445556666',
                'Cinema.user_id' => '1'
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

    public function testValideTelephoneEspace() {
        $data = array('Cinema' => array(
                'id' => '1',
                'name' => 'Prout',
                'society' => 'Moldu',
                'phone' => '444 555 6666',
                'user_id' => '1'
        ));

        $result = $this->Cinema->save($data);
        $this->assertArrayHasKey('Cinema', $result);

        $result = $this->Cinema->find('count', array(
            'conditions' => array(
                'Cinema.id' => '1',
                'Cinema.name' => 'Prout',
                'Cinema.society' => 'Moldu',
                'Cinema.phone' => '444 555 6666',
                'Cinema.user_id' => '1'
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

    public function testValideTelephoneTiret() {
        $data = array('Cinema' => array(
                'id' => '1',
                'name' => 'Prout',
                'society' => 'Moldu',
                'phone' => '444-555-6666',
                'user_id' => '1'
        ));

        $result = $this->Cinema->save($data);
        $this->assertArrayHasKey('Cinema', $result);

        $result = $this->Cinema->find('count', array(
            'conditions' => array(
                'Cinema.id' => '1',
                'Cinema.name' => 'Prout',
                'Cinema.society' => 'Moldu',
                'Cinema.phone' => '444-555-6666',
                'Cinema.user_id' => '1'
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

}
