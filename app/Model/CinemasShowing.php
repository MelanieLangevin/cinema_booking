<?php

App::uses('AppModel', 'Model');

/**
 * CinemasShowing Model
 *
 * @property Cinema $Cinema
 * @property Showing $Showing
 */
class CinemasShowing extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'cinema_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'showing_id' => array(
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
        'Cinema' => array(
            'className' => 'Cinema',
            'foreignKey' => 'cinema_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Showing' => array(
            'className' => 'Showing',
            'foreignKey' => 'showing_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
