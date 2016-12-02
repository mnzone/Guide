<?php
/**
 * 基础控制器
 *
 * @package  app
 * @extends  Controller
 */

abstract class Controller_BaseController extends Controller_Template {
    public $template = 'default/template';
    public $theme = 'default';
    protected $result_message = false;

    public function before(){
        parent::before();
    }
}
