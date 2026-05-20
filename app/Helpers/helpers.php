<?php

if (!function_exists('userId')) {
    function userId()
    {
        return auth()->id();
    }
}
