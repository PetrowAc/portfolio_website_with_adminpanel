<?php
if (!function_exists('webpImage')) {
    function webpImage($src, $name, $ext) {
        if ($src == '') {
            $src = 'images/';
        }

        if ($ext == '') {
            $ext = 'jpg';
        }

        echo ' <picture><source srcset="'.$src.$name.'.webp" type="image/webp" /><img src="'.$src.$name.'.'.$ext.'" alt="" /></picture> ';
    }
}