<?php defined('SYSPATH') or die('No direct script access.');

class Model_Good extends ORM {

    protected $_table_name = 'good_items';
    
    protected $_has_many = array(
        'prices' => array(
            'model'   => 'price'
        )
    );


} // End