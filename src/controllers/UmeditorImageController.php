<?php

use Illuminate\Routing\Controller;
use Zhuzhichao\Umeditor\UmeditorUploader;

class UmeditorImageController extends Controller {
	public function upload() {
        //上传配置
        $config = Config::get('umeditor::upload');

        //背景保存在临时目录中
        $up = new UmeditorUploader( "upfile" , $config );
        $callback = Input::get('callback');
        $info = $up->getFileInfo();

        /**
         * 返回数据
         */
        if($callback) {
            return '<script>'.$callback.'('.json_encode($info).')</script>';
        } else {
            return json_encode($info);
        }
    }

    public function config() {
        $config = '(function () {
            window.UMEDITOR_CONFIG =';
        $config .= json_encode(Config::get('umeditor::editor'));
        $config .= ';})();';

        return Response::make($config, 200, ['Content-Type' => 'text/javascript']);
    }
}