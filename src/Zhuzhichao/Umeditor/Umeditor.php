<?php namespace Zhuzhichao\Umeditor;

class Umeditor {
    public static function content($content='', $config=[]) {

        $attr = Umeditor::makeConfig2String($config);
        echo "<script type='text/plain' {$attr}>{$content}</script>";
    }

    private static function makeConfig2String($config) {
        $string = '';
        if(is_array($config)) {
            if($config===[]) {
                $string = "id='myEditor'";
            }
            foreach($config as $k=>$v) {
                $string .= " {$k}='{$v}'";
            }
        } else {
            $string = "id='{$config}'";
        }

        return $string;
    }

    public static function css() {
        echo '<link href="packages/zhuzhichao/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">';
    }

    public static function js() {
        echo '<script type="text/javascript" charset="utf-8" src="'.route('umeditor.config').'"></script>';
        echo '<script type="text/javascript" src="packages/zhuzhichao/umeditor/third-party/jquery.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="packages/zhuzhichao/umeditor/umeditor.min.js"></script>
            <script type="text/javascript" src="packages/zhuzhichao/umeditor/lang/zh-cn/zh-cn.js"></script>';
    }
}