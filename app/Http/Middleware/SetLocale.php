<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Récupère la langue stockée dans la session ou utilise la langue par défaut (app.php)
        $locale = Session::get('locale', config('app.locale'));

        // Applique la langue
        App::setLocale($locale);

        return $next($request);
    }
}
