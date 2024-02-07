<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchivoRequest;

use App\Models\Datos_anime;
use App\Models\Datos_libro;
use App\Models\Datos_musica;
use App\Models\Datos_pelicula;
use App\Models\Datos_revista;
use App\Models\Datos_serie;
use App\Models\Datos_video;
use App\Models\Documental;
use App\Models\Otro;
use App\Models\Software;
use App\Models\Pelicula;
use App\Models\Tipo;
use App\Models\Archivo;
use App\Models\Serie;
use App\Models\Video;
use App\Models\Anime;
use App\Models\Musica;
use App\Models\Libro;
use App\Models\Revista;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Redirect;

class ArchivoController extends Controller
{
    //
    public function obtenerListado($tipo)
    {
        $resultado = array();
        $encontrado = 0;

        switch ($tipo) {
            case 'Peliculas':
                # code...
                // pelicula id 25, datos pelicula 8, tipo id 138, archivo id 135
                $lista = Datos_pelicula::all();
                foreach ($lista as $elem) {
                    $peliculas = $elem->peliculas;
                    foreach ($peliculas as $pelicula) {
                        if ($pelicula->file_path != null) {
                            $archivo = $pelicula->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                // dd(Archivo::where('id', 135)->first()->tipo()->first()->tipable);
                // dd(Pelicula::where('id', 25)->first()->tipo()->first()->archivo);
                break;
            case 'Series':
                $lista = Datos_serie::all();
                foreach ($lista as $elem) {
                    $series = $elem->series;
                    foreach ($series as $serie) {
                        if ($serie->file_path != null) {
                            $archivo = $serie->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Libros':
                $lista = Datos_libro::all();
                foreach ($lista as $elem) {
                    $libros = $elem->libros;
                    foreach ($libros as $libro) {
                        if ($libro->file_path != null) {
                            $archivo = $libro->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Revistas':
                $lista = Datos_revista::all();
                foreach ($lista as $elem) {
                    $revistas = $elem->revistas;
                    foreach ($revistas as $revista) {
                        if ($revista->file_path != null) {
                            $archivo = $revista->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Animes':
                $lista = Datos_anime::all();
                foreach ($lista as $elem) {
                    $animes = $elem->animes;
                    foreach ($animes as $anime) {
                        if ($anime->file_path != null) {
                            $archivo = $anime->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Musica':
                $lista = Datos_musica::all();
                foreach ($lista as $elem) {
                    $musica = $elem->musica;
                    foreach ($musica as $music) {
                        if ($music->file_path != null) {
                            $archivo = $music->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Videos':
                $lista = Datos_video::all();
                foreach ($lista as $elem) {
                    $videos = $elem->videos;
                    foreach ($videos as $video) {
                        if ($video->file_path != null) {
                            $archivo = $video->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($resultado, $elem);
                                $encontrado = 1;
                                break;
                            }
                        }
                    }
                    $encontrado = 0;
                }
                break;
            case 'Documentales':
                $lista = Documental::all();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        $archivo = $elem->tipo()->first()->archivo;
                        if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                            array_push($resultado, $elem);
                        }
                    }
                }
                break;
            case 'Software':
                $lista = Software::all();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        $archivo = $elem->tipo()->first()->archivo;
                        if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                            array_push($resultado, $elem);
                        }
                    }
                }
                break;
            case 'Otros':
                $lista = Otro::all();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        $archivo = $elem->tipo()->first()->archivo;
                        if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                            array_push($resultado, $elem);
                        }
                    }
                }
                break;
            case 'Eliminados':
                $sagas = array();
                $lista = Pelicula::onlyTrashed()->get();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_pelicula->saga, $sagas)) {
                            array_push($sagas[$elem->datos_pelicula->saga], ['nombre' => $elem->nombre_pelicula, 'path' => $elem->file_path]);
                        } else {
                            $sagas[$elem->datos_pelicula->saga] = array();
                            array_push($sagas[$elem->datos_pelicula->saga], ['nombre' => $elem->nombre_pelicula, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($sagas)) {
                    array_push($resultado, [
                        'tipo' => 'Peliculas',
                        'lista' => $sagas
                    ]);
                }

                $aux = array();
                $series = array();
                $lista = Serie::onlyTrashed()->get();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_serie->nombre_serie, $series)) {
                            if (array_key_exists($elem->numero_temporada, $series[$elem->datos_serie->nombre_serie])) {
                                array_push($series[$elem->datos_serie->nombre_serie][$elem->numero_temporada], ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                            } else {
                                $aux1 = array();
                                array_push($aux1, ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                                $series[$elem->datos_serie->nombre_serie][$elem->numero_temporada] = $aux1;
                            }
                        } else {
                            $series[$elem->datos_serie->nombre_serie] = array();
                            $aux = array();
                            $aux[$elem->numero_temporada] = array();
                            array_push($aux[$elem->numero_temporada], ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                            $series[$elem->datos_serie->nombre_serie] = $aux;
                        }
                    }
                }
                if (!empty($series)) {
                    array_push($resultado, [
                        'tipo' => 'Series',
                        'lista' => $series
                    ]);
                }

                $colecciones = array();
                $lista = Libro::onlyTrashed()->get();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_libro->coleccion, $colecciones)) {
                            array_push($colecciones[$elem->datos_libro->coleccion], ['nombre' => $elem->nombre_libro, 'path' => $elem->file_path]);
                        } else {
                            $colecciones[$elem->datos_libro->coleccion] = array();
                            array_push($colecciones[$elem->datos_libro->coleccion], ['nombre' => $elem->nombre_libro, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($colecciones)) {
                    array_push($resultado, [
                        'tipo' => 'Libros',
                        'lista' => $colecciones
                    ]);
                }

                $revistas = array();
                $lista = Revista::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_revista->nombre_revista, $revistas)) {
                            array_push($revistas[$elem->datos_revista->nombre_revista], ['nombre' => $elem->numero, 'path' => $elem->file_path]);
                        } else {
                            $revistas[$elem->datos_revista->nombre_revista] = array();
                            array_push($revistas[$elem->datos_revista->nombre_revista], ['nombre' => $elem->numero, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($revistas)) {
                    array_push($resultado, [
                        'tipo' => 'Revistas',
                        'lista' => $revistas
                    ]);
                }

                $aux = array();
                $animes = array();
                $lista = Anime::onlyTrashed()->get();
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_anime->nombre_anime, $animes)) {
                            if (array_key_exists($elem->numero_temporada, $animes[$elem->datos_anime->nombre_anime])) {
                                array_push($animes[$elem->datos_anime->nombre_anime][$elem->numero_temporada], ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                            } else {
                                $aux1 = array();
                                array_push($aux1, ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                                $animes[$elem->datos_anime->nombre_anime][$elem->numero_temporada] = $aux1;
                            }
                        } else {
                            $animes[$elem->datos_anime->nombre_anime] = array();
                            $aux = array();
                            $aux[$elem->numero_temporada] = array();
                            array_push($aux[$elem->numero_temporada], ['numero_episodio' => $elem->numero_episodio, 'path' => $elem->file_path]);
                            $animes[$elem->datos_anime->nombre_anime] = $aux;
                        }
                    }
                }
                if (!empty($animes)) {
                    array_push($resultado, [
                        'tipo' => 'Animes',
                        'lista' => $animes
                    ]);
                }

                $musica = array();
                $lista = Musica::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_musica->album, $musica)) {
                            array_push($musica[$elem->datos_musica->album], ['nombre' => $elem->nombre_cancion, 'path' => $elem->file_path]);
                        } else {
                            $musica[$elem->datos_musica->album] = array();
                            array_push($musica[$elem->datos_musica->album], ['nombre' => $elem->nombre_cancion, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($musica)) {
                    array_push($resultado, [
                        'tipo' => 'Musica',
                        'lista' => $musica
                    ]);
                }

                $videos = array();
                $lista = Video::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->datos_video->lista, $videos)) {
                            array_push($videos[$elem->datos_video->lista], ['nombre' => $elem->nombre_video, 'path' => $elem->file_path]);
                        } else {
                            $videos[$elem->datos_video->lista] = array();
                            array_push($videos[$elem->datos_video->lista], ['nombre' => $elem->nombre_video, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($videos)) {
                    array_push($resultado, [
                        'tipo' => 'Videos',
                        'lista' => $videos
                    ]);
                }

                $documentales = array();
                $lista = Documental::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->nombre_documental, $documentales)) {
                            array_push($documentales, ['nombre' => $elem->nombre_documental, 'path' => $elem->file_path]);
                        } else {
                            array_push($documentales, ['nombre' => $elem->nombre_documental, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($documentales)) {
                    array_push($resultado, [
                        'tipo' => 'Documentales',
                        'lista' => $documentales
                    ]);
                }

                $software = array();
                $lista = Software::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->nombre_software, $software)) {
                            array_push($software, ['nombre' => $elem->nombre_software, 'path' => $elem->file_path]);
                        } else {
                            array_push($software, ['nombre' => $elem->nombre_software, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($software)) {
                    array_push($resultado, [
                        'tipo' => 'Software',
                        'lista' => $software
                    ]);
                }

                $otros = array();
                $lista = Otro::onlyTrashed()->get();
                // dd($lista);
                foreach ($lista as $elem) {
                    if ($elem->file_path != null) {
                        if (array_key_exists($elem->nombre_otro, $otros)) {
                            array_push($otros, ['nombre' => $elem->nombre_otro, 'path' => $elem->file_path]);
                        } else {
                            array_push($otros, ['nombre' => $elem->nombre_otro, 'path' => $elem->file_path]);
                        }
                    }
                }
                if (!empty($otros)) {
                    array_push($resultado, [
                        'tipo' => 'Otros',
                        'lista' => $otros
                    ]);
                }

                // dd($resultado);
                return json_encode($resultado);
                break;
            default:
                # code...
                break;
        }
        // dd($resultado);
        return $resultado;
    }

    public function mostrar_por_tipo(Request $request, string $tipo)
    {
        switch ($tipo) {
            case 'Films':
            case 'Peliculas':
                $listado = $this->obtenerListado("Peliculas");
                // dd(gettype($listado));
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.film')]);
                break;
            case 'Series':
                $listado = $this->obtenerListado("Series");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.series')]);
                break;
            case 'Books':
            case 'Libros':
                $listado = $this->obtenerListado("Libros");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.book')]);
                break;
            case 'Magazine':
            case 'Revistas':
                $listado = $this->obtenerListado("Revistas");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.magazine')]);
                break;
            case 'Anime':
            case 'Animes':
                $listado = $this->obtenerListado("Animes");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.anime')]);
                break;
            case 'Music':
            case 'Musica':
                $listado = $this->obtenerListado("Musica");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.music')]);
                break;
            case 'Video':
            case 'Videos':
                $listado = $this->obtenerListado("Videos");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.video')]);
                break;
            case 'Documentaries':
            case 'Documentales':
                $listado = $this->obtenerListado("Documentales");
                // dd($listado);
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.documentary')]);
                break;
            case 'Software':
                $listado = $this->obtenerListado("Software");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.software')]);
                break;
            case 'Other':
            case 'Otros':
                $listado = $this->obtenerListado("Otros");
                return view('listado.home')->with(['listado' => $listado, 'tipo' => __('messages.other')]);
                break;
            case 'Eliminados':
                $listado = $this->obtenerListado("Eliminados");
                // dd($listado);
                // dd(gettype($listado));
                return view('listado.eliminados')->with(['listado' => $listado, 'tipo' => 'Eliminados']);
                break;
        }
        return $tipo;
    }

    public function mostrar_por_tipo_y_nombre(Request $request, string $tipo, string $id)
    {
        $listado = array();

        switch ($tipo) {
            case 'Films':
            case 'Peliculas':
                $datos_ = Datos_pelicula::where('id', $id)->get();
                if ($datos_->isNotEmpty()) {
                    foreach ($datos_[0]->peliculas()->orderBy('orden', 'asc')->get() as $pelicula) {
                        if ($pelicula->file_path != null) {
                            $archivo = $pelicula->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($listado, $pelicula);
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->saga : null;
                break;
            case 'Series':
                $datos_ = Datos_serie::where('id', $id)->get();
                $listado = $datos_->isNotEmpty() ? $this->crear_array_ordenado_temporada_episodio($datos_[0]->series) : null;
                if ($listado != null) {
                    foreach ($listado as $temporada => &$episodios) {
                        $cont = 0;
                        foreach ($episodios as $episodio) {
                            $archivo = $episodio->tipo()->first()->archivo;
                            if (($archivo->privado == 1 && $archivo->archivos_subidos != Auth::user()) && Auth::user()->tipo != 0) {
                                array_splice($episodios, $cont, 1);
                            } else {
                                $cont++;
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->nombre_serie : null;
                break;
            case 'Books':
            case 'Libros':
                $datos_ = Datos_libro::where('id', $id)->get();
                if ($datos_->isNotEmpty()) {
                    foreach ($datos_[0]->libros()->orderBy('orden', 'asc')->get() as $libro) {
                        if ($libro->file_path != null) {
                            $archivo = $libro->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($listado, $libro);
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->coleccion : null;
                break;
            case 'Magazine':
            case 'Revistas':
                $datos_ = Datos_revista::where('id', $id)->get();
                if ($datos_->isNotEmpty()) {
                    foreach ($datos_[0]->revistas()->orderBy('numero', 'asc')->get() as $revista) {
                        if ($revista->file_path != null) {
                            $archivo = $revista->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($listado, $revista);
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->nombre_revista : null;
                break;
            case 'Anime':
            case 'Animes':
                $datos_ = Datos_anime::where('id', $id)->get();
                $listado = $datos_->isNotEmpty() ?  $this->crear_array_ordenado_temporada_episodio($datos_[0]->animes) : null;
                if ($listado != null) {
                    foreach ($listado as $temporada => &$episodios) {
                        $cont = 0;
                        foreach ($episodios as $episodio) {
                            $archivo = $episodio->tipo()->first()->archivo;
                            if (($archivo->privado == 1 && $archivo->archivos_subidos != Auth::user() && Auth::user()->tipo != 0)) {
                                array_splice($episodios, $cont, 1);
                            } else {
                                $cont++;
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->nombre_anime : null;
                break;
            case 'Music':
            case 'Musica':
                // dd($id);
                $datos_ = Datos_musica::where('id', $id)->get();
                if ($datos_->isNotEmpty()) {
                    // dd("A");
                    foreach ($datos_[0]->musica()->orderBy('numero_cancion', 'asc')->get() as $musica) {
                        if ($musica->file_path != null) {
                            $archivo = $musica->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($listado, $musica);
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->album : null;
                break;
            case 'Video':
            case 'Videos':
                $datos_ = Datos_video::where('id', $id)->get();
                if ($datos_->isNotEmpty()) {
                    foreach ($datos_[0]->videos()->orderBy('numero_video', 'asc')->get() as $video) {
                        if ($video->file_path != null) {
                            $archivo = $video->tipo()->first()->archivo;
                            if ($archivo->privado == 0 || ($archivo->privado == 1 && $archivo->archivos_subidos == Auth::user()) || Auth::user()->tipo == 0) {
                                array_push($listado, $video);
                            }
                        }
                    }
                }
                $nombre = $datos_->isNotEmpty() ? $datos_[0]->lista : null;
                break;
                // case 'Documentaries':
                // case 'Documentales':
                //     $datos_ = Documental::where('id', $id)->get();
                //     if ($datos_->isNotEmpty()) {
                //         dd("a");
                //     }
                //     $listado = $datos_->isNotEmpty() ?  $datos_ : null;
                //     $nombre = $datos_->isNotEmpty() ? $datos_[0]->nombre : null;
                //     $tipo = 'Documentales';
                //     break;
                // case 'Software':
                //     $datos_ = Software::where('id', $id)->get();
                //     $listado = $datos_->isNotEmpty() ?  $datos_[0] : null;
                //     $nombre = $datos_->isNotEmpty() ? $datos_[0]->nombre : null;
                //     $tipo = 'Software';
                //     break;
                // case 'Other':
                // case 'Otros':
                //     $datos_ = Otro::where('id', $id)->get();
                //     $listado = $datos_->isNotEmpty() ?  $datos_[0] : null;
                //     $nombre = $datos_->isNotEmpty() ? $datos_[0]->info : null;
                //     $tipo = 'Otros';
                //     break;
        }

        return view('listado.tipo')->with(['listado' => $listado, 'nombre' => $nombre, 'tipo' => $tipo]);
        // return $datos_serie->series()->orderBy('numero_episodio', 'asc')->get();

    }

    public function crear_array_ordenado_temporada_episodio($listado)
    {
        $resultado = [];

        foreach ($listado as $elemento) {
            if (!array_key_exists($elemento->numero_temporada, $resultado)) {
                $resultado[$elemento->numero_temporada] = array($elemento);
            } else {
                array_push($resultado[$elemento->numero_temporada], $elemento);
            }
        }

        $resultado = $this->ordena_temporadas($resultado);
        $resultado = $this->ordena_episodios($resultado);
        return $resultado;
    }

    public function ordena_temporadas($listado)
    {
        ksort($listado, SORT_NUMERIC);

        return $listado;
    }

    public function ordena_episodios($listado)
    {
        // Función de comparación para usort
        $compararEpisodios = function ($a, $b) {
            return $a->numero_episodio - $b->numero_episodio;
        };

        foreach ($listado as $temp => &$episodio) {
            usort($episodio, $compararEpisodios);
        }
        return $listado;
    }

    public function mostrar_form_datos_tipo(Request $request, string $tipo, string $accion)
    {
        $generos = $listado = null;

        switch ($tipo) {
            case 'Peliculas':
            case 'Films':
                $listado = DB::table('datos_pelicula')->select('saga')->distinct()->get();
                break;
            case 'Series':
                $listado = DB::table('datos_serie')->select('nombre_serie')->distinct()->get();
                break;
            case 'Libros':
            case 'Books':
                $listado = DB::table('datos_libro')->select('coleccion')->distinct()->get();
                break;
            case 'Revistas':
            case 'Magazine':
                $listado = DB::table('datos_revista')->select('nombre_revista')->distinct()->get();
                break;
            case 'Animes':
                // dd("a");
                $listado = DB::table('datos_anime')->select('nombre_anime')->distinct()->get();
                // dd($generos);
                // dd($tipo);
                break;
            case 'Musica':
            case 'Music':
                $listado = DB::table('datos_musica')->select('album')->distinct()->get();
                $artistas = DB::table('musica')->select('artista')->distinct()->get();
                return view('crearArchivo')->with(['ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $tipo]), 'lista' => $listado, 'generos' => $generos, 'artistas' => $artistas, 'tipo' => $tipo]);
                // dd($listado);
                break;
            case 'Videos':
            case 'Video':
                $listado = DB::table('datos_video')->select('lista')->distinct()->get();
                $generos = DB::table('datos_video')->select('genero_1')->distinct()->get();
                break;
            default:
                # code...
                break;
        }
        // dd($tipo);
        return view('crearArchivo')->with(['ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $tipo]), 'tipo' => $tipo, 'lista' => $listado, 'generos' => $generos]);
    }

    public function crear_datos_tipo(ArchivoRequest $request)
    {
        $lista = null;
        // dd($request);
        // return $request->tipo;
        if ($request->file('file')->isValid()) {
            if ($request->nombre_pelicula) {
                $this->crea_pelicula($request);
                $lista = DB::table('datos_pelicula')->select('saga')->distinct()->get();
            }
            if ($request->nombre_serie) {
                $this->crea_serie($request);
                $lista = DB::table('datos_serie')->select('nombre_serie')->distinct()->get();
            }
            if ($request->nombre_libro) {
                $this->crea_libro($request);
                $lista = DB::table('datos_libro')->select('coleccion')->distinct()->get();
            }
            if ($request->nombre_revista) {
                $this->crea_revista($request);
                $lista = DB::table('datos_revista')->select('nombre_revista')->distinct()->get();
            }
            if ($request->nombre_anime) {
                $this->crea_anime($request);
                $lista = DB::table('datos_anime')->select('nombre_anime')->distinct()->get();
            }
            if ($request->nombre_cancion) {
                $this->crea_cancion($request);
                $artistas = DB::table('musica')->select('artista')->distinct()->get();
                $lista = DB::table('datos_musica')->select('album')->distinct()->get();
                return view('crearArchivo')->with(['ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'lista' => $lista, 'artistas' => $artistas, 'mensaje' => trans('messages.file_uploaded'), 'tipo' => $request->tipo]);
            }
            if ($request->nombre_video) {
                $this->crea_video($request);
                $lista = DB::table('datos_video')->select('lista')->distinct()->get();
                $generos = DB::table('datos_video')->select('genero_1')->distinct()->get();
                return view('crearArchivo')->with(['tipo' => $request->tipo, 'ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'mensaje' => trans('messages.file_uploaded'), 'lista' => $lista, 'generos' => $generos]);
            }
            if ($request->nombre_documental) {
                $this->crea_documental($request);
            }
            if ($request->nombre_software) {
                if (!in_array($request->file->getClientOriginalExtension(), ['exe', 'rar', 'zip', '7zip', 'msi'])) {
                    return view('crearArchivo')->with(['tipo' => $request->tipo, 'ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'mensaje' => trans('messages.file_error')]);
                } else {
                    $this->crea_software($request);
                }
            }
            if ($request->nombre_otro) {
                $this->crea_otro($request);
            }
        } else {
            return view('crearArchivo')->with(['tipo' => $request->tipo, 'ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'mensaje' => trans('messages.file_error')]);
        }
        // if ($request->nombre_video) {
        //     $generos = DB::table('datos_video')->select('genero_1')->distinct()->get();
        //     return view('crearArchivo')->with(['tipo' => $request->tipo, 'ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'mensaje' => trans('messages.file_uploaded'), 'generos' => $generos]);
        // }
        return view('crearArchivo')->with(['tipo' => $request->tipo, 'ruta' => route('archivo.home.mostrar_por_tipo', ['tipo' => $request->tipo]), 'mensaje' => trans('messages.file_uploaded'), 'lista' => $lista]);
    }

    public function crea_pelicula($request)
    {
        // dd(Auth::user()->id);
        $path = $request->file('file')->storeAs('public/Peliculas/' . $request->saga, $request->nombre_pelicula . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_pelicula = Datos_pelicula::where('saga', $request->saga)->first();
        if (!$datos_pelicula) {
            $datos_pelicula = Datos_pelicula::create(['saga' => $request->saga, 'genero_1' => $request->genero_1, 'genero_2' => $request->genero_2, 'genero_3' => $request->genero_3]);
        } else {
            $datos_pelicula->genero_1 = $request->genero_1;
            $datos_pelicula->genero_2 = $request->genero_2;
            $datos_pelicula->genero_3 = $request->genero_3;
            $datos_pelicula->save();
        }

        $request->orden_pelicula ? $orden = $request->orden_pelicula : $orden = 1;

        $pelicula = Pelicula::create(['nombre_pelicula' => $request->nombre_pelicula, 'orden' => $orden, 'id_datos_pelicula' => $datos_pelicula->id, 'file_path' => $path]);

        $tipo = new Tipo;
        $pelicula->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $pelicula->nombre_pelicula;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_serie($request)
    {
        $path = $request->file('file')->storeAs('public/Series/' . $request->nombre_serie . '/' . $request->numero_temporada_serie, $request->numero_episodio_serie . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_serie = Datos_serie::where('nombre_serie', $request->nombre_serie)->first();
        if (!$datos_serie) {
            $datos_serie = Datos_serie::create(['nombre_serie' => $request->nombre_serie, 'genero_1' => $request->genero_1, 'genero_2' => $request->genero_2, 'genero_3' => $request->genero_3]);
        } else {
            $datos_serie->genero_1 = $request->genero_1;
            $datos_serie->genero_2 = $request->genero_2;
            $datos_serie->genero_3 = $request->genero_3;
            $datos_serie->save();
        }
        $serie = Serie::create(['id_datos_serie' => $datos_serie->id, 'file_path' => $path, 'numero_temporada' => $request->numero_temporada_serie, 'numero_episodio' => $request->numero_episodio_serie]);

        $tipo = new Tipo;
        $serie->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $serie->numero_episodio;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_libro($request)
    {
        $path = $request->file('file')->storeAs('public/Libros/' . $request->coleccion, $request->nombre_libro . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_libro = Datos_libro::where('coleccion', $request->coleccion)->first();
        if (!$datos_libro) {
            $datos_libro = Datos_libro::create(['coleccion' => $request->coleccion, 'genero_1' => $request->genero_1, 'genero_2' => $request->genero_2, 'genero_3' => $request->genero_3]);
        } else {
            $datos_libro->genero_1 = $request->genero_1;
            $datos_libro->genero_2 = $request->genero_2;
            $datos_libro->genero_3 = $request->genero_3;
            $datos_libro->save();
        }
        // dd($datos_libro->id);
        $request->orden ? $orden = $request->orden : $orden = 1;

        $libro = Libro::create(['id_datos_libro' => $datos_libro->id, 'file_path' => $path, 'nombre_libro' => $request->nombre_libro, 'orden' => $orden]);

        $tipo = new Tipo;
        $libro->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $libro->nombre_libro;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_revista($request)
    {
        $path = $request->file('file')->storeAs('public/Revistas/' . $request->nombre_revista, $request->numero . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_revista = Datos_revista::where('nombre_revista', $request->nombre_revista)->first();
        if (!$datos_revista) {
            $datos_revista = Datos_revista::create(['nombre_revista' => $request->nombre_revista, 'tema' => $request->genero_1]);
        } else {
            $datos_revista->tema = $request->genero_1;
            $datos_revista->save();
        }
        $revista = Revista::create(['id_datos_revista' => $datos_revista->id, 'file_path' => $path, 'numero' => $request->numero]);

        $tipo = new Tipo;
        $revista->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $revista->numero;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_anime($request)
    {
        $path = $request->file('file')->storeAs('public/Animes/' . $request->nombre_anime . '/' . $request->numero_temporada, $request->numero_episodio . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_anime = Datos_anime::where('nombre_anime', $request->nombre_anime)->first();
        if (!$datos_anime) {
            $datos_anime = Datos_anime::create(['nombre_anime' => $request->nombre_anime, 'genero_1' => $request->genero_1, 'genero_2' => $request->genero_2, 'genero_3' => $request->genero_3]);
        } else {
            $datos_anime->genero_1 = $request->genero_1;
            $datos_anime->genero_2 = $request->genero_2;
            $datos_anime->genero_3 = $request->genero_3;
            $datos_anime->save();
        }
        $anime = Anime::create(['id_datos_anime' => $datos_anime->id, 'file_path' => $path, 'numero_temporada' => $request->numero_temporada, 'numero_episodio' => $request->numero_episodio]);

        $tipo = new Tipo;
        $anime->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $anime->numero_episodio;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_cancion($request)
    {
        // dd($request);

        if ($request->artista != null) {
            $path = $request->file('file')->storeAs('public/Musica/' . $request->artista . '/' . $request->album, $request->nombre_cancion . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());
        } else {
            $path = $request->file('file')->storeAs('public/Musica/' . $request->album, $request->nombre_cancion . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());
        }

        $datos_musica = Datos_musica::where('album', $request->album)->first();
        if (!$datos_musica) {
            $datos_musica = Datos_musica::create(['album' => $request->album, 'genero_1' => $request->genero_1, 'genero_2' => $request->genero_2]);
        } else {
            $datos_musica->genero_1 = $request->genero_1;
            $datos_musica->genero_2 = $request->genero_2;
            $datos_musica->save();
        }
        $musica = Musica::create(['id_datos_musica' => $datos_musica->id, 'file_path' => $path, 'nombre_cancion' => $request->nombre_cancion, 'numero_cancion' => $request->numero_cancion, 'artista' => $request->artista]);

        $tipo = new Tipo;
        $musica->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $musica->nombre_cancion;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_video($request)
    {
        $path = $request->file('file')->storeAs('public/Videos/' . $request->lista, $request->nombre_video . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $datos_video = Datos_video::where('lista', $request->lista)->first();
        if (!$datos_video) {
            $datos_video = Datos_video::create(['lista' => $request->lista, 'genero_1' => $request->genero_1]);
        } else {
            $datos_video->genero_1 = $request->genero_1;
            $datos_video->save();
        }
        $video = Video::create(['id_datos_video' => $datos_video->id, 'file_path' => $path, 'nombre_video' => $request->nombre_video]);

        $tipo = new Tipo;
        $video->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $video->nombre_video;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_documental($request)
    {
        $path = $request->file('file')->storeAs('public/Documentales', $request->nombre_documental . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $documental = Documental::create(['file_path' => $path, 'nombre_documental' => $request->nombre_documental, 'genero_1' => $request->genero_1]);

        $tipo = new Tipo;
        $documental->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $documental->nombre_documental;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_software($request)
    {
        $path = $request->file('file')->storeAs('public/Software', $request->nombre_software . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $software = Software::create(['file_path' => $path, 'nombre_software' => $request->nombre_software]);

        $tipo = new Tipo;
        $software->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $software->nombre_software;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function crea_otro($request)
    {
        $path = $request->file('file')->storeAs('public/Otros', $request->nombre_otro . "_" . Auth::user()->id . "." . $request->file->getClientOriginalExtension());

        $otro = Otro::create(['file_path' => $path, 'nombre_otro' => $request->nombre_otro]);

        $tipo = new Tipo;
        $otro->tipo()->save($tipo);

        $archivo = new Archivo;
        $archivo->nombre_archivo = $otro->nombre_otro;
        $archivo->file_path = $path;
        $archivo->tipo()->associate($tipo);
        $archivo->archivos_subidos()->associate(Auth::user());
        $archivo->privado = $request->has('privado') ? 1 : 0;
        $archivo->tamaño = ($request->file('file')->getSize() / 1024) / 1024;
        $archivo->save();
    }

    public function descargar_archivo(Request $request, string $path)
    {
        // dd($request);
        // dd($path);
        return Storage::download($path);
    }

    public function obtenerInfo(Request $request, string $tipo, string $id)
    {
        // return json_encode($id);
        switch ($tipo) {
            case 'Peliculas':
                // return json_encode("a");
                $dp = Datos_pelicula::where('saga', $id)->first();
                if ($dp) {
                    $pelicula['genero_1'] = $dp->genero_1;
                    $pelicula['genero_2'] = $dp->genero_2;
                    $pelicula['genero_3'] = $dp->genero_3;
                    if (count($dp->peliculas()->orderBy('orden')->get()) != 0) {
                        $pelicula['orden'] = $dp->peliculas()->orderBy('orden')->get()->last()->orden;
                    } else {
                        $pelicula['orden'] = 0;
                    }
                } else {
                    $pelicula['orden'] = 0;
                }
                $pelicula['no_genre'] = trans('messages.no_genre');
                return json_encode($pelicula);
                break;
            case 'Series':
                $ds = Datos_serie::where('nombre_serie', $id)->first();
                if ($ds) {
                    $serie['genero_1'] = $ds->genero_1;
                    $serie['genero_2'] = $ds->genero_2;
                    $serie['genero_3'] = $ds->genero_3;
                    if (count($ds->series()->orderBy('numero_temporada')->get()) != 0) {
                        $serie['numero_temporada'] = $ds->series()->orderBy('numero_temporada')->get()->last()->numero_temporada;
                    } else {
                        $serie['numero_temporada'] = 0;
                    }
                    if (count($ds->series()->where('numero_temporada', $serie['numero_temporada'])->orderBy('numero_episodio')->get()) != 0) {
                        $serie['numero_episodio'] = $ds->series()->where('numero_temporada', $serie['numero_temporada'])->orderBy('numero_episodio')->get()->last()->numero_episodio;
                    } else {
                        $serie['numero_episodio'] = 0;
                    }
                } else {
                    $serie['numero_temporada'] = 0;
                    $serie['numero_episodio'] = 0;
                }
                $serie['no_genre'] = trans('messages.no_genre');
                return json_encode($serie);
                break;
            case 'Libros':
                $dl = Datos_libro::where('coleccion', $id)->first();
                if ($dl) {
                    $libro['genero_1'] = $dl->genero_1;
                    $libro['genero_2'] = $dl->genero_2;
                    $libro['genero_3'] = $dl->genero_3;
                    if (count($dl->libros()->orderBy('orden')->get()) != 0) {
                        $libro['orden'] = $dl->libros()->orderBy('orden')->get()->last()->orden;
                    } else {
                        $libro['orden'] = 0;
                    }
                } else {
                    $libro['orden'] = 0;
                }
                $libro['no_genre'] = trans('messages.no_genre');
                return json_encode($libro);
                break;
            case 'Revistas':
                $dr = Datos_revista::where('nombre_revista', $id)->first();
                if ($dr) {
                    $revista['genero_1'] = $dr->tema;
                    if (count($dr->revistas()->orderBy('numero')->get()) != 0) {
                        $revista['numero'] = $dr->revistas()->orderBy('numero')->get()->last()->numero;
                    } else {
                        $revista['numero'] = 0;
                    }
                } else {
                    $revista['numero'] = 0;
                }
                $revista['no_genre'] = trans('messages.no_genre');
                return json_encode($revista);
                break;
            case 'Animes':
                $da = Datos_anime::where('nombre_anime', $id)->first();
                if ($da) {
                    $anime['genero_1'] = $da->genero_1;
                    $anime['genero_2'] = $da->genero_2;
                    $anime['genero_3'] = $da->genero_3;
                    if (count($da->animes()->orderBy('numero_temporada')->get()) != 0) {
                        $anime['numero_temporada'] = $da->animes()->orderBy('numero_temporada')->get()->last()->numero_temporada;
                    } else {
                        $anime['numero_temporada'] = 0;
                    }
                    if (count($da->animes()->where('numero_temporada', $anime['numero_temporada'])->orderBy('numero_episodio')->get()) != 0) {
                        $anime['numero_episodio'] = $da->animes()->where('numero_temporada', $anime['numero_temporada'])->orderBy('numero_episodio')->get()->last()->numero_episodio;
                    } else {
                        $anime['numero_episodio'] = 0;
                    }
                } else {
                    $anime['numero_temporada'] = 0;
                    $anime['numero_episodio'] = 0;
                }
                $anime['no_genre'] = trans('messages.no_genre');
                return json_encode($anime);
                break;
            case 'Musica':
                $dm = Datos_musica::where('album', $id)->first();
                if ($dm) {
                    $musica['genero_1'] = $dm->genero_1;
                    $musica['genero_2'] = $dm->genero_2;
                    if (count($dm->musica()->orderBy('numero_cancion')->get()) != 0) {
                        $musica['numero_cancion'] = $dm->musica()->orderBy('numero_cancion')->get()->last()->numero_cancion;
                    } else {
                        $musica['numero_cancion'] = 0;
                    }
                } else {
                    $musica['numero_cancion'] = 0;
                }
                $musica['no_genre'] = trans('messages.no_genre');
                return json_encode($musica);
                break;
            case 'Videos':
                $dv = Datos_video::where('lista', $id)->first();
                if ($dv) {
                    $video['genero_1'] = $dv->genero_1;
                }
                $video['no_genre'] = trans('messages.no_genre');
                return json_encode($video);
                break;
            default:
                # code...
                break;
        }

        // return $id;
    }

    public function borrarArchivo(Request $request, string $tipo)
    {
        // return json_encode("a");
        switch ($tipo) {
            case 'Peliculas':
                $pelicula = Pelicula::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($pelicula) {
                    if (Auth::user()->tipo == 0) {
                        $pelicula->tipo->archivo->forceDelete();
                        $pelicula->tipo->forceDelete();
                        Storage::delete($pelicula->file_path);
                        $pelicula->forceDelete();
                    } else {
                        $pelicula->nombre_pelicula = '*' . $pelicula->nombre_pelicula;
                        $pelicula->save();
                        $pelicula->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Series':
                $serie = Serie::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($serie) {
                    if (Auth::user()->tipo == 0) {
                        $serie->tipo->archivo->forceDelete();
                        $serie->tipo->forceDelete();
                        Storage::delete($serie->file_path);
                        $serie->forceDelete();
                    } else {
                        $serie->numero_episodio = $serie->numero_episodio * -1;
                        $serie->save();
                        $serie->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Libros':
                $libro = Libro::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($libro) {
                    if (Auth::user()->tipo == 0) {
                        $libro->tipo->archivo->forceDelete();
                        $libro->tipo->forceDelete();
                        Storage::delete($libro->file_path);
                        $libro->forceDelete();
                    } else {
                        $libro->nombre_libro = '*' . $libro->nombre_libro;
                        $libro->save();
                        $libro->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Revistas':
                $revista = Revista::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($revista) {
                    if (Auth::user()->tipo == 0) {
                        $revista->tipo->archivo->forceDelete();
                        $revista->tipo->forceDelete();
                        Storage::delete($revista->file_path);
                        $revista->forceDelete();
                    } else {
                        $revista->numero = '*' . $revista->numero;
                        $revista->save();
                        $revista->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Animes':
                $anime = Anime::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($anime) {
                    if (Auth::user()->tipo == 0) {
                        $anime->tipo->archivo->forceDelete();
                        $anime->tipo->forceDelete();
                        Storage::delete($anime->file_path);
                        $anime->forceDelete();
                    } else {
                        $anime->numero_episodio = '*' . $anime->numero_episodio;
                        $anime->save();
                        $anime->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Musica':
                $musica = Musica::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($musica) {
                    if (Auth::user()->tipo == 0) {
                        $musica->tipo->archivo->forceDelete();
                        $musica->tipo->forceDelete();
                        Storage::delete($musica->file_path);
                        $musica->forceDelete();
                    } else {
                        $musica->nombre_cancion = '*' . $musica->nombre_cancion;
                        $musica->save();
                        $musica->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Videos':
                $video = Video::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($video) {
                    if (Auth::user()->tipo == 0) {
                        $video->tipo->archivo->forceDelete();
                        $video->tipo->forceDelete();
                        Storage::delete($video->file_path);
                        $video->forceDelete();
                    } else {
                        $video->nombre_video = '*' . $video->nombre_video;
                        $video->save();
                        $video->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Documentales':
                $documental = Documental::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($documental) {
                    if (Auth::user()->tipo == 0) {
                        $documental->tipo->archivo->forceDelete();
                        $documental->tipo->forceDelete();
                        Storage::delete($documental->file_path);
                        $documental->forceDelete();
                    } else {
                        $documental->nombre_documental = '*' . $documental->nombre_documental;
                        $documental->save();
                        $documental->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Software':
                $software = Software::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($software) {
                    if (Auth::user()->tipo == 0) {
                        $software->tipo->archivo->forceDelete();
                        $software->tipo->forceDelete();
                        Storage::delete($software->file_path);
                        $software->forceDelete();
                    } else {
                        $software->nombre_software = '*' . $software->nombre_software;
                        $software->save();
                        $software->delete();
                    }
                    return 'OK';
                }
                break;
            case 'Otros':
                $otro = Otro::withTrashed()->where('file_path', $request->input('path'))->first();
                if ($otro) {
                    if (Auth::user()->tipo == 0) {
                        $otro->tipo->archivo->forceDelete();
                        $otro->tipo->forceDelete();
                        Storage::delete($otro->file_path);
                        $otro->forceDelete();
                    } else {
                        $otro->nombre_software = '*' . $otro->nombre_software;
                        $otro->save();
                        $otro->delete();
                    }
                    return 'OK';
                }
                break;
            default:
                # code...
                break;
        }
        return "MAL";
    }
}
