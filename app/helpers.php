<?php

if(!function_exists("euro")) 
{
    function euro($value)
    {
        return "€ " . number_format($value, 2, ",", ".");
    }
}