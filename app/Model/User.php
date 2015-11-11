<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Cinema $Cinema
 */
class User extends AppModel {

    var $displayField = 'username';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required',
                'allowEmpty' => false
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required',
                'allowEmpty' => false
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'gerant')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Cinema' => array(
            'className' => 'Cinema',
            'foreignKey' => 'user_id',
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

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function isOwnedBy($user, $userAModifier) {
        return $this->field('id', array('id' => $user, 'id' => $userAModifier)) !== false;
    }

}
