<?php

App::uses('User', 'Model');

/**
 * User Test Case
 */
class UserTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user',
        'app.cinema',
        //'app.showing',
        'app.movie',
            //'app.category',
            //'app.rating',
            //'app.cinemas_showing',
            //'app.schedule',
            //'app.schedules_showing'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->User);

        parent::tearDown();
    }

    
    //public function isOwnedBy($user, $userAModifier) {
    // return $this->field('id', array('id' => $user, 'id' => $userAModifier)) !== false;
    //}
    public function testIsOwnedByDifferent() {

        $isOwned = $this->User->isOwnedBy(2, 5);

        $this->assertFalse($isOwned);
    }

    public function testIsOwnedByMeme() {
        
        $isOwned = $this->User->isOwnedBy(1, 1);

        $this->assertTrue($isOwned);

    }
    
    public function testInvalidEmail() {
        // Build the data to save
        $data = array('User' => array(
                'username' => 'Jean Racine',
                'email' => 'jenracine.co.uk',
                'role' => 'admin',
                'isConfirmed' => 0
        ));

        $result = $this->User->save($data);
        $this->assertFalse($result);
    }

    public function testValidEmail() {
        // Build the data to save
        $data = array('User' => array(
                'username' => 'Jean Racine',
                'email' => 'jenracine@leroysoleil.fr',
                'role' => 'admin',
                'isConfirmed' => 0
        ));

        // Attempt to save
        $result = $this->User->save($data);

        // Test successful insert
        $this->assertArrayHasKey('User', $result);

        // Get the count in the DB
        $result = $this->User->find('count', array(
            'conditions' => array(
                'User.email' => 'jenracine@leroysoleil.fr',
                'User.username' => 'Jean Racine',
                'User.role' => 'admin',
                'isConfirmed' => 0
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

}
