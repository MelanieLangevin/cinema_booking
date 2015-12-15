<?php

class MovieTest extends CakeTestCase {

    public $fixtures = array(
        'app.movie',
    );

    public function setUp() {
        parent::setUp();

        // Load Contact Model
        $this->Movie = ClassRegistry::init('Movie');
    }

    public function tearDown() {
        unset($this->Movie);

        parent::tearDown();
    }

    public function testTrouverFilmAucunPossedeRating() {

        $FilmTrouve = $this->Movie->trouverFilmSelonRate(3);
        $this->assertCount(0, $FilmTrouve);
    }

    public function testTrouverFilmPlusieurPossedeRating() {
        $FilmTrouve = $this->Movie->trouverFilmSelonRate(2);
        $this->assertCount(2, $FilmTrouve);
    }

    public function testTrouverFilmUniquePossedeRating() {
        $FilmTrouve = $this->Movie->trouverFilmSelonRate(4);
        $this->assertCount(1, $FilmTrouve);
    }

    public function testFilmPosterVide() {
        // Build the data to save along with an empty file
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => 2000,
                'studio' => 'Dreamworks Studio',
                'resume' => 'prout',
                'poster' => '',
                'category_id' => 1,
                'rating_id' => 1
            )
        );

        // Attempt to save
        $result = $this->Movie->save($data);

        // Test successful insert
        $this->assertArrayHasKey('Movie', $result);
        
        // Get the count in the DB
        $result = $this->Movie->find('count', array(
            'conditions' => array(
                'Movie.titre' => 'SuckerPunch',
                'Movie.annee' => 2000,
                'Movie.studio' => 'Dreamworks Studio',
                'Movie.poster' => '',
                'Movie.category_id' => 1,
                'Movie.rating_id' => 1
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }

    public function testFormWithValidFile() {
        // Create a stub for the Contact Model class
        $stub = $this->getMockForModel('Movie', array('is_uploaded_file', 'move_uploaded_file'));

        // Always return TRUE for the 'is_uploaded_file' function
        $stub->expects($this->once())
                ->method('is_uploaded_file')
                ->will($this->returnValue(TRUE));
        // Copy the file instead of 'move_uploaded_file' to allow testing
        $stub->expects($this->once())
                ->method('move_uploaded_file')
                ->will($this->returnCallback('copy'));

        // Build the data to save along with a sample file
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => 2,
                //'studio' => 'dsadsadsa',
                'poster' => array(
                    'name' => 'TestFile.jpg',
                    'type' => 'image/jpg',
                    // modified with windows DS backslash
                    'tmp_name' => 'C:\Users\Melanie\Downloads\UniServerZ\www\cinema_booking2\app\webroot\img\uploads\TestFile.jpg',
                    // original from tutorial
                    //'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
                    'error' => 0,
                    'size' => 845941,
                ),
                'category_id' => 1,
                'rating_id' => 1
        ));

        // Attempt to save
        $result = $stub->save($data);

        // Test successful insert
        $this->assertArrayHasKey('Movie', $result);

        // Get the count in the DB
        $entryCount = $this->Movie->find('count', array(
            'conditions' => array(
                'Movie.titre' => 'SuckerPunch',
                'Movie.annee' => 2,
                //'Movie.studio' => 'dsadsadsa',
                'poster' => 'uploads/TestFile.jpg',
                'Movie.category_id' => 1,
                'Movie.rating_id' => 1
            )
        ));

        // Test DB entry
        $this->assertEqual($entryCount, 1);

        // Test uploaded file exists
        $this->assertFileExists(WWW_ROOT . 'img' . DS . 'uploads' . DS . 'TestFile.jpg');
    }

    public function testFormWithInvalidFile() {
        // Create a stub for the Contact Model class
        $stub = $this->getMockForModel('Movie', array('is_uploaded_file', 'move_uploaded_file'));

        // Always return TRUE for the 'is_uploaded_file' function
        $stub->expects($this->any())
                ->method('is_uploaded_file')
                ->will($this->returnValue(TRUE));
        // Copy the file instead of 'move_uploaded_file' to allow testing
        $stub->expects($this->any())
                ->method('move_uploaded_file')
                ->will($this->returnCallback('copy'));

        // Build the data to save along with a sample file
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => 2,
                'poster' => array(
                    'name' => 'TestFile.txt',
                    'type' => 'text/plain',
                    // modified with windows DS backslash
                    'tmp_name' => 'C:\Users\Melanie\Downloads\UniServerZ\www\cinema_booking2\app\webroot\img\uploads\TestFile.txt',
                    'error' => 0,
                    'size' => 19,
                ),
                'category_id' => 1,
                'rating_id' => 1
        ));

        // Attempt to save
        $result = $stub->save($data);

        // Test failure
        $this->assertFalse($result);

        // Test uploaded file does not exists
        $this->assertFileNotExists(WWW_ROOT . 'uploads' . DS . 'TestFile.txt');
    }

    public function testValidAnnee() {
        // Build the data to save
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => 2000,
                'studio' => 'Dreamworks Studio',
                'resume' => 'prout',
                'poster' => '',
                'category_id' => 1,
                'rating_id' => 1
            )
        );

        // Attempt to save
        $result = $this->Movie->save($data);

        // Test successful insert
        $this->assertArrayHasKey('Movie', $result);

        // Get the count in the DB
        $result = $this->Movie->find('count', array(
            'conditions' => array(
                'Movie.titre' => 'SuckerPunch',
                'Movie.annee' => 2000,
                'Movie.studio' => 'Dreamworks Studio',
                'Movie.poster' => '',
                'Movie.category_id' => 1,
                'Movie.rating_id' => 1
            ),
        ));

        // Test DB entry
        $this->assertEqual($result, 1);
    }
    
    public function testInvalideAnneeLettre() {
        
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => 'ab',
                'studio' => 'Dreamworks Studio',
                'resume' => 'prout',
                'poster' => '',
                'category_id' => 1,
                'rating_id' => 1
            )
        );

        // Attempt to save
        $result = $this->Movie->save($data);
//debug($result); /*debug($entryCount);*/ die();
        // Test save failed
        $this->assertFalse($result);
        
    }
        public function testInvalideAnneeSymbole() {
        
        $data = array('Movie' => array(
                'titre' => 'SuckerPunch',
                'annee' => '!?',
                'studio' => 'Dreamworks Studio',
                'resume' => 'prout',
                'poster' => '',
                'category_id' => 1,
                'rating_id' => 1
            )
        );

        // Attempt to save
        $result = $this->Movie->save($data);
//debug($result); /*debug($entryCount);*/ die();
        // Test save failed
        $this->assertFalse($result);
        
    }

}
