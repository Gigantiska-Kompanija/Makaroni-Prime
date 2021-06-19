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
//        $session = $request->session();

        if (!$request->hasCookie(self::COOKIE)) {
            $lang = $request->getPreferredLanguage(self::LOCALES);
        } else {
            $lang = $request->cookie(self::COOKIE);
        }
//
//        if ($request->has('lang')) {
//            $lang = $request->get('lang');
//            if (in_array($lang, self::LOCALES)) {
//                $request->session()->put(self::SESSION_KEY, $lang);
//            }
//        }

        App::setLocale($lang);

        return $next($request)->withCookie(cookie()->forever(self::COOKIE, $lang));
    }
}
