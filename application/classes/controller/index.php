<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller {

    protected $layout = 'index';
    
    public function before()
    {
        $this->layout = View::factory($this->layout);
    }
    
    public function after()
    {
        $this->response->body( $this->layout->render() );
    }
    
	public function action_index()
	{
		$this->layout->content = View::factory('good/list', array(
            'goods' => ORM::factory('good')->find_all()->as_array(),
            'rules' => ORM::factory('rule')->find_all()->as_array()
        ));
	}

} // End
