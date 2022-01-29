<?php

if (!function_exists('flashAlert')) {
    function flashAlert($type,$title,$message){ 
        session()->flash('alert-type',$type);
        session()->flash('alert-title',$title);
        session()->flash('alert-message',$message);
    } 
}
?>