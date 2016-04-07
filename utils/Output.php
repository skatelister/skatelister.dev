<?php

class Output 
{
    public static function escape($key) {
        return htmlspecialchars(strip_tags($key));
    }



}