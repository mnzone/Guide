<?php

/**
 * 激活码关联管理
 *
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/11/25
 * Time: 12:39
 */
class Controller_Console_Log extends Controller_BaseController
{

    public $template = 'console/template';
    public $theme = 'console';

    public function before(){
        parent::before();
    }

    public function action_index(){

        $params = [
            'title' => '激活码关联管理'
        ];

        $params['cats'] = \Model_ProductCodeCategory::query()->get();

        $params['products'] = \Model_Product::query()->get();

        $params['codes'] = \Model_ProductCode::query()->get();

        $pid = \Input::get('pid', false);
        $product = \Model_ProductCodeLog::query();
        if($pid){
            $product->where('product_id', $pid);
        }
        $product->order_by(['id' => 'desc']);
        $params['items'] = $product->get();

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/log/index");
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

        $code = \Model_ProductCodeLog::forge();
        if($id){
            $code = \Model_ProductCodeLog::find($id);
        }

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

    public function action_send_email(){

        $msg = [
            'status' => 'err',
            'msg' => '',
            'errcode' => 10
        ];

        $data = \Input::post();

        $email = \Email::forge();
        $email->to($data['to']);
        $email->subject($data['subject']);
        $email->body($data['body']);

        try{
            $email->send();
            $msg = [
                'status' => 'succ',
                'msg' => '',
                'errcode' => 0
            ];
        } catch(\EmailSendingFailedException $e) {
            $msg['msg'] = $e->getMessage();
        } catch(\EmailValidationFailedException $e) {
            $msg['msg'] = $e->getMessage();
        }

        die(json_encode($msg));
    }

}