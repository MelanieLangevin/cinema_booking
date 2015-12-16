<?php
/**
 * Movie Fixture
 */
class MovieFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'titre' => array('type' => 'string','default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'annee' => array('type' => 'integer','default' => null, 'unsigned' => false),
		'studio' => array('type' => 'string','default' => null, 'length' => 75, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'resume' => array('type' => 'string','default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'poster' => array('type' => 'string','default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'id' => 1,
			'titre' => 'V for Vendetta',
			'annee' => 1,
			'studio' => 'Dreamworks Studio',
			'resume' => 'prout',
			'poster' => '',
			'category_id' => 1,
			'rating_id' => 1
		),
		array(
			'id' => 2,
			'titre' => 'Harry Potter : La coupe de feu',
			'annee' => 2,
			'studio' => 'Warner Bros Studio',
			'resume' => 'Because',
			'poster' => '',
			'category_id' => 2,
			'rating_id' => 2
		),
		array(
			'id' => 3,
			'titre' => 'Harry Potter : Le prince de sang-mêlé',
			'annee' => 3,
			'studio' => 'Warner Bros Studio',
			'resume' => 'Ça load de quoi',
			'poster' => '',
			'category_id' => 2,
			'rating_id' => 2
		),
		array(
			'id' => 4,
			'titre' => 'Lord Of The Ring',
			'annee' => 4,
			'studio' => 'MGM',
			'resume' => '"Je suis méchante" - Nawar',
			'poster' => '',
			'category_id' => 4,
			'rating_id' => 4
		),
	);

}
