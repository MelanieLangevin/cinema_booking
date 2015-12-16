<?php
/**
 * Contact Fixture
 */
class StudioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Warner Bros Studios',
		),
            		array(
			'id' => '2',
			'name' => 'Walt Disney Studios',
		),
            		array(
			'id' => '3',
			'name' => 'Dreamworks Studios',
		),
            		array(
			'id' => '4',
			'name' => 'Marvel Studios',
		),
            		array(
			'id' => '5',
			'name' => 'MGM Studios',
		),
	);

}