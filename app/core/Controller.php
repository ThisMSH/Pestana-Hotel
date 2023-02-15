<?php
class Controller {
    public static function load($view_name, $view_data = []) {
        $file = VIEWS . $view_name . ".php";

        if(file_exists($file)) {
            ob_start();
            extract($view_data);
            require($file);
            ob_end_flush();
        }else {
            echo $view_name." doesn't exist, or I'm doing something wrong";
        }
    }
}