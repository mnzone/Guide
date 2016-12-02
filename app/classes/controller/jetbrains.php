<?php
/**
 * Jetbrains系统软件控制器
 * 
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/10/24
 * Time: 16:55
 */

class Controller_Jetbrains extends Controller_BaseController {

    public function before(){
        parent::before();
    }

    public function action_index(){}

    public function action_activation($code = false){

        $item = \Model_ProductCodeLog::query()
            ->where('license_id', $code)
            ->get_one();
        \View::set_global([
            'item' => $item,
            'product' => $item->product
        ]);

        $this->template->content = \View::forge("{$this->theme}/jetbrains/activation");
    }

    public function action_local(){
        $this->template->content = \View::forge("{$this->theme}/jetbrains/local");
    }

    public function action_setup($code){

        $item = \Model_ProductCodeLog::query()
            ->where('license_id', $code)
            ->get_one();
        \View::set_global([
            'item' => $item,
            'product' => $item->product
        ]);

        $this->template->content = \View::forge("{$this->theme}/jetbrains/setup");
    }

}