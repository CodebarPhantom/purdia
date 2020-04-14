<?php

namespace Anggagewor\Purdia;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Purdia
{

    public function version()
    {
        return '1.0.0';
    }

    public function name()
    {
        return config('purdia.name');
    }

    public function getResources()
    {
        $links = [];
        foreach (json_decode(json_encode(Route::getRoutes()->get(), true), true) as $route) {
            $a = (string) str_replace('/', '', config('purdia.path'));
            $b = (string) $route['action']['prefix'];
            if (Str::contains($b, $a)) {
                $tmp = explode('/', $route['uri']);
                if (count($tmp) >= 2) {
                    $links[] =$tmp[1];
                }
            }
        }
        return array_unique($links);
    }
}
