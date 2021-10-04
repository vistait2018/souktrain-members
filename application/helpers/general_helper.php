<?php

function display_downline($downlines,$color, $n=1){
    if(!is_array($downlines)) return false;
    //var_dump($downlines);
    $str =  '<ol class="dd-list">';
    foreach ($downlines as $downline){
        //var_dump($downlines);
        @$name      = "{$downline['profile']['first_name']} {$downline['profile']['last_name']}";
        @$email     = $downline['email'];
        @$telephone = $downline['profile']['phone_no'];
        $user_id    = $downline['id'];



        $str .=   '<li class="dd-item dd3-item dd-collapsed" data-id="'.$user_id.'" title="Click \'-/+\' to show/hide downline">';
        $str .=     '<div class="dd-nodrag dd-handle dd3-handle"></div>';
        $str .=     "<div class='dd3-content'><b class='label' style='background-color:{$color}'>{$n}</b>. Name: {$name}, Email: <a href='mailto:{$email}'>{$email}</a> , Telephone: <em>{$telephone}</em></div>";

        @$str .=display_downline($downline['down_line'], $color, $n+1);

        $str .=   '</li>';


    }
    $str .=   '</ol>';
    return $str;
}