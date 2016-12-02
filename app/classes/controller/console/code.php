<?php

/**
 * 激活码管理
 *
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/11/25
 * Time: 12:39
 */
class Controller_Console_Code extends Controller_BaseController
{

    public $template = 'console/template';
    public $theme = 'console';

    public function before(){
        parent::before();
    }

    public function action_index(){

        $params = [
            'title' => '激活码管理'
        ];

        $params['cats'] = \Model_ProductCodeCategory::query()->get();

        $code = \Model_ProductCode::query();
        $cid = \Input::get('cid', false);
        if($cid){
            $code->where('category_id', $cid);
        }

        $params['items'] = $code->order_by(['id' => 'desc'])->get();

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/code/index");
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

        $code = \Model_ProductCode::forge();
        if($id){
            $code = \Model_ProductCode::find($id);
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