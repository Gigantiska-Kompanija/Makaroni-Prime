<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale {
    const COOKIE = 'locale';
    const LOCALES = ['en', 'lv'];

    protected $except_urls = [
        'api/*'
    ];

    public function handle(Request $request, Closure $next) {
        if (!$request->hasCookie(self::COOKIE)) {
            $lang = $request->getPreferredLanguage(self::LOCALES);
        } else {
            $lang = $request->cookie(self::COOKIE);
        }

        App::setLocale($lang);

        return $next($request)->withCookie(cookie()->forever(self::COOKIE, $lang));
    }
}
