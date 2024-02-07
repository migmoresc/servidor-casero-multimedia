<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class PasarTipoAVistaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tipo = null;
        if ($request->tipo != null) {
            switch ($request->tipo) {
                case 'Peliculas':
                case 'Films':
                    $tipo = 'Peliculas';
                    break;
                case 'Series':
                    $tipo = 'Series';
                    break;
                case 'Libros':
                case 'Books':
                    $tipo = 'Libros';
                    break;
                case 'Revistas':
                case 'Magazine':
                    $tipo = 'Revistas';
                    break;
                case 'Anime':
                    $tipo = 'Anime';
                    break;
                case 'Musica':
                case 'Music':
                    $tipo = 'Musica';
                    break;
                case 'Videos':
                case 'Video':
                    $tipo = 'Videos';
                    break;
                case 'Documentales':
                case 'Documentaries':
                    $tipo = 'Documentales';
                    break;
                case 'Software':
                    $tipo = 'Software';
                    break;
                case 'Otros':
                case 'Other':
                    $tipo = 'Otros';
                    break;
                default:
                    # code...
                    break;
            }
            View::share('tipo', $tipo);
        }

        return $next($request);
    }
}
