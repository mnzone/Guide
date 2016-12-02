<?php

/**
 * 商品管理
 *
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/11/25
 * Time: 12:40
 */
class Controller_Console_Product extends Controller_BaseController
{

    public $template = 'console/template';
    public $theme = 'console';

    public function before(){
        parent::before();
    }

    public function action_index(){

        $params = [
            'title' => '虚拟产品管理'
        ];

        $params['items'] = \Model_Product::query()->get();

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/product/index");
    }

    public function action_save($id = 0){

        if(\Input::method() != 'POST'){
            die(json_encode([
                'status' => 'err',
                'errcode' => 10,
                'msg' => '非法请求'
            ]));
        }

        $data = \Input::post();

        $code = \Model_Product::forge();
        if($id){
            $code = \Model_Product::find($id);
        }

        $data['expired_at'] = strtotime($data['expired_at']);
        $code->set($data);
        if( ! $code->save()){
            die(json_encode([
                'status' => 'err',
                'errcode' => 10,
                'msg' => '非法请求'
            ]));
        }

        die(json_encode([
            'status' => 'succ',
            'errcode' => 0,
            'msg' => ''
        ]));
    }
}