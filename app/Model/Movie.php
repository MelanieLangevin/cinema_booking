<?php

App::uses('AppModel', 'Model');

/**
 * Movie Model
 *
 * @property Category $Category
 * @property Rating $Rating
 * @property Showing $Showing
 */
class Movie extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'titre';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'titre' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'annee' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'poster' => array(
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'allowEmpty' => TRUE,
            ),
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                'message' => 'Invalid file, only images allowed',
                'allowEmpty' => TRUE,
            ),
//           'filesize' => array(
//                'rule' => array('filesize', '<=', '1MB'),
//                'message' => 'Article image must be less then 1MB',
//                'allowEmpty' => TRUE,
//            ),
            // custom callback to deal with the file upload
            'processImageUpload' => array(
                'rule' => 'processImageUpload',
                'message' => 'Something went wrong processing your file',
                'allowEmpty' => TRUE,
            )  
        ),
        'category_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'rating_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Rating' => array(
            'className' => 'Rating',
            'foreignKey' => 'rating_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Showing' => array(
            'className' => 'Showing',
            'foreignKey' => 'movie_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function trouverFilmSelonRate($rating_id) {
        $movies = $this->find('list', array(
            'conditions' => array(
                'Movie.rating_id' => $rating_id
            ),
            'recursive' => -1
        ));
        
        return $movies;
    }
    
    /**
 * Process the Upload
 * @param array $check
 * @return boolean
 */
public function processImageUpload($check=array()) {
//    debug($check); die();
	// deal with uploaded file
	if (!empty($check['poster']['tmp_name'])) {

		// check file is uploaded
		if (!$this->is_uploaded_file($check['poster']['tmp_name'])) {
			return FALSE;
		}

		// build full filename
		$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['poster']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['poster']['name'], PATHINFO_EXTENSION);

		// @todo check for duplicate filename

		// try moving file
		if (!$this->move_uploaded_file($check['poster']['tmp_name'], $filename)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
			$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", 'uploads'. $filename) );
		}
	}

	return TRUE;
}

/**
 * Before Save Callback
 * @param array $options
 * @return boolean
 */
public function beforeSave($options = array()) {
	// a file has been uploaded so grab the filepath
	if (!empty($this->data[$this->alias]['filepath'])) {
		$this->data[$this->alias]['poster'] = $this->data[$this->alias]['filepath'];
	}
	
	return parent::beforeSave($options);
}

public function beforeValidate($options = array()) {
	// ignore empty file - causes issues with form validation when file is empty and optional
	if (!empty($this->data[$this->alias]['poster']['error']) && $this->data[$this->alias]['poster']['error']==4 && $this->data[$this->alias]['poster']['size']==0) {
		unset($this->data[$this->alias]['poster']);
	}

	parent::beforeValidate($options);
}

	public function is_uploaded_file($tmp_name) {
		return is_uploaded_file($tmp_name);
	}

	/**
	 * Wrapper method for 'move_uploaded_file' to allow testing
	 * @param string $from
	 * @param string $to
	 */
	public function move_uploaded_file($from, $to) {
		return move_uploaded_file($from, $to);
	}

}
