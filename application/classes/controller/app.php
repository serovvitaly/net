<?php defined('SYSPATH') or die('No direct script access.');

class Controller_App extends Controller {

    protected $_rep_controllers = array(
        'controller',
        'store',
        'view',
        'model'
    );
    
    public function action_index()
    {   
        $type      = $this->request->param('type');
        $module    = $this->request->param('module');
        $component = $this->request->param('component');
        
        if (in_array($type, $this->_rep_controllers)) {
            $view = View::factory(strtolower("ext/$module/$type/$component"));
        }
        else {
            $view = View::factory(strtolower("ext/$type/$module/$component"));
        }
        
         
        $this->response->body($view);
    }


} // End