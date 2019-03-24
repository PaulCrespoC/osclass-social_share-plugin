<?php
/**
 * Created by PhpStorm.
 * User: paulc
 * Date: 23/3/2019
 * Time: 20:31
 */

$values = json_decode(osc_get_preference('social_share_active_links'));

$validatedElements = [];
foreach ($_POST as $key => $value){
    if ($key != 'CSRFName' || $key != 'CSRFToken'){
        if (validateCheckbox($value)){
            $validatedElements[$key] = $value;
        }
    }
}

foreach($values as $key => $value){
    $values->$key = 'off';
}

foreach($validatedElements as $key => $value) {
    $values->$key = $value;
}

osc_set_preference('social_share_active_links', json_encode($values));

header('Location: ' . osc_route_admin_url('social_share_settings'));

function validateCheckbox($string){
    return filter_var(
        $string,
        FILTER_VALIDATE_REGEXP,
        array(
            "options" => array(
                "regexp" => "/^(on|off)$/"
            )
        )
    );
}