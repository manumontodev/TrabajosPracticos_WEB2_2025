<?php
class ConfigApp {
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
        'Home' => 'showHome',
        'About' => 'showAbout',
        'Unidad' => 'showEjercicios',
        'Formulario' => 'show_formulario',
        'Tabla' => 'show_tabla'
    ];

    function parseUrl($url){
        $arr_data = explode("/", $url);
        $arrayReturn[ConfigApp::$ACTION] = $arr_data[0];
        $arrayReturn[ConfigApp::$PARAMS]= isset($arr_data[1]) ? array_slice($arr_data, 1) : null;
        return $arrayReturn;
    }
}

?>