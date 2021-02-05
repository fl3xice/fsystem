<?php


namespace fi;


class RouterWriter
{
    public static function RouteExecutor($fn) : string {
        print $fn();
        return '%';
    }
}