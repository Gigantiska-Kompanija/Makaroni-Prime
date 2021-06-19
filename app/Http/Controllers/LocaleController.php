<?php


namespace App\Http\Controllers;


use App\Http\Middleware\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller {
    public function set(Request $request) {
        $request->validate([
            'lang' => 'required|string'
        ]);

        App::setLocale($request->lang);

        Cookie::queue(cookie()->forever(Locale::COOKIE, $request->lang));
    }
}
