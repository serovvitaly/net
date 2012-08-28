<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Data extends Controller {

    public function action_index()
    {        
        $this->response->body('');
    }
    
    public function action_goods_list()
    {   
        $goods = array();
        
        $gd = ORM::factory('good')->find_all()->as_array();
        
        $rules = ORM::factory('rule')->find_all()->as_array();
        
        foreach ($gd AS $good) {
            
            $ru = array();
            
            foreach ($rules AS $rule) {
               $ru['rule_' . $rule->id] = $good->prices->where('rule_id', '=', $rule->id)->find()->price;
            }
            
            $goods[] = array_merge(array(
                'id' => $good->id,
                'title' => $good->title
            ), $ru);
        }
     
        $output = array(
            'goods' => $goods
        );
        
        $this->response->body(json_encode($output));
    }


} // End