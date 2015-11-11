<?php

App::uses('AppModel', 'Model');

class Studio extends AppModel {

    public $displayField = "name";

    public function getStudioNames($term = null) {
        if (!empty($term)) {
            $studios = $this->find('list', array(
                'conditions' => array(
                    'name LIKE' => trim($term) . '%'
                )
            ));
            return $studios;
        }
        return false;
    }

}
