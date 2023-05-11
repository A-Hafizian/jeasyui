<?php
class Tools{
    public static function validation ($data){
        return trim(htmlspecialchars(addslashes($data)));
    }
}