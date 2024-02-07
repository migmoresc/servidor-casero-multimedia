<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArchivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tipo = ($this->route('tipo'));

        switch ($tipo) {
            case 'Peliculas':
                // dd($this->has('privado'));
                return [
                    'saga' => 'required|max:50|min:3|regex:/^[a-zA-Z0-9\s]+$/i',
                    'nombre_pelicula' => 'required|unique:peliculas,nombre_pelicula|max:50|min:3',
                    'orden' => 'between:1,127|numeric|nullable',
                    'genero_1' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'genero_2' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'genero_3' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'file' => 'file|required|mimes:mp4,avi,wmv,mkv,webm,movie'
                ];
                break;

            case 'Series':
                // dd($this);
                return [
                    'nombre_serie' => 'required|max:255|min:3|regex:/^[a-zA-Z0-9\s]+$/i',
                    'numero_temporada_serie' => 'between:1,127|numeric',
                    'numero_episodio_serie' => 'between:1,32767|numeric',
                    'genero_1' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción, Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca, Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'genero_2' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción, Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca, Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'genero_3' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción, Fantasía,Musical,Terror,Cine mudo,Película 3D,Animación,Religiosa,Futurista,Policíaca, Crimen,Bélica,Histórica,Deportiva,Western|nullable',
                    'file' => 'file|required|mimes:mp4,avi,wmv,mkv,webm,movie'
                ];
                break;

            case 'Libros':
                return [
                    'coleccion' => 'required|max:32|min:3|regex:/^[a-zA-Z0-9\s]+$/i',
                    'nombre_libro' => 'required|max:255|min:3',
                    'genero_1' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Novela,Terror,Prosa,Poesía,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica, Histórica,Deportiva,Western,Poema|nullable',
                    'genero_2' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Novela,Terror,Prosa,Poesía,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica, Histórica,Deportiva,Western,Poema|nullable',
                    'genero_3' => 'in:Comedia,Drama,Suspense,Acción,Aventuras,Ciencia ficción,No ficción,Fantasía,Novela,Terror,Prosa,Poesía,Animación,Religiosa,Futurista,Policíaca,Crimen,Bélica, Histórica,Deportiva,Western,Poema|nullable',
                    'file' => 'file|required|mimes:pdf,pub,zip,rar,7zip'
                ];
                break;

            case 'Revistas':
                return [
                    'nombre_revista' => 'required|max:24|min:3|regex:/^[a-zA-Z0-9\s]+$/i',
                    'genero_1' => 'in:Prensa rosa,Prensa amarilla,Noticias,Actualidad,Deportes,Ciencia,Curiosidades,Infantil,Coleccionable,Informática,Adulto|nullable',
                    'file' => 'file|required|mimes:pdf,pub,zip,rar,7zip'
                ];
                break;

            case 'Animes':
                return [
                    'nombre_anime' => 'required|max:32|min:3|regex:/^[a-zA-Z0-9\s]+$/i',
                    'numero_temporada' => 'between:1,32767|numeric',
                    'numero_episodio' => 'between:1,32767|numeric',
                    'genero_1' => 'in:Shonen,Shojo,Seinen,Josei,Kodomomuke,Isekai,Mecha,Fantasía,Ciencia ficción,Romance,Slice of life,Comedia,Drama,Aventuras,Horror,Supernatural,Misterio,Psicológico,Historical,Musical,Yaoi,Yuri,Deportivo,Ninjas,Pelea|nullable',
                    'genero_2' => 'in:Shonen,Shojo,Seinen,Josei,Kodomomuke,Isekai,Mecha,Fantasía,Ciencia ficción,Romance,Slice of life,Comedia,Drama,Aventuras,Horror,Supernatural,Misterio,Psicológico,Historical,Musical,Yaoi,Yuri,Deportivo,Ninjas,Pelea|nullable',
                    'genero_3' => 'in:Shonen,Shojo,Seinen,Josei,Kodomomuke,Isekai,Mecha,Fantasía,Ciencia ficción,Romance,Slice of life,Comedia,Drama,Aventuras,Horror,Supernatural,Misterio,Psicológico,Historical,Musical,Yaoi,Yuri,Deportivo,Ninjas,Pelea|nullable',
                    'file' => 'file|required|mimes:mp4,avi,wmv,mkv,webm,movie'
                ];
                break;

            case 'Musica':
                // dd($this);
                return [
                    'album' => 'required|min:3|max:24||regex:/^[a-zA-Z0-9\s]+$/i',
                    'genero_1' => 'in:Pop,Rock,Jazz,Blues,R&B (Rhythm and Blues),Hip Hop,Rap,Country,Folk,Clásica,Electrónica,Dance,Reggae,Soul,Funk,Metal,Punk,Indie,Gospel,J-Pop (Pop japonés),K-Pop (Pop coreano),World Music,Latina,Experimental,Alternativa,Ambiental,Instrumental,Blues Rock,Country Rock,Hard Rock,Heavy Metal,Rap Rock,Rap Metal,Pop-Rock,Indie Rock,Folk Rock,Electronic Dance Music (EDM),House,Techno,Trance|nullable',
                    'genero_2' => 'in:Pop,Rock,Jazz,Blues,R&B (Rhythm and Blues),Hip Hop,Rap,Country,Folk,Clásica,Electrónica,Dance,Reggae,Soul,Funk,Metal,Punk,Indie,Gospel,J-Pop (Pop japonés),K-Pop (Pop coreano),World Music,Latina,Experimental,Alternativa,Ambiental,Instrumental,Blues Rock,Country Rock,Hard Rock,Heavy Metal,Rap Rock,Rap Metal,Pop-Rock,Indie Rock,Folk Rock,Electronic Dance Music (EDM),House,Techno,Trance|nullable',
                    'nombre_cancion' => 'required|max:24|min:3',
                    'file' => 'file|required|mimes:mp3,mp4'
                ];
                break;

            case 'Videos':
                return [
                    'lista' => 'required|min:3|max:32|regex:/^[a-zA-Z0-9\s]+$/i',
                    'nombre_video' => 'required|max:255|min:3',
                    // 'genero_1' => 'required|min:3|max:24',
                    'file' => 'file|required|mimes:mp4,avi,wmv,mkv,webm,movie'
                ];
                break;
            case 'Documentales':
                // dd($this);
                return [
                    'nombre_documental' => 'required|max:255|min:3',
                    'genero_1' => 'in:Histórico,Biográfico,Científico,Ambiental,Social,Político,Viajes,Arte,Tecnología,Deportes,Salud,Crimen,Ciencia Ficción,Música,Comida,Educativo,Deportes Extremos,Guerra,Investigación Filosofía|nullable',
                    'file' => 'file|required|mimes:mp4,avi,wmv,mkv,webm,movie'
                ];
                break;

            case 'Software':
                // dd($this);
                return [
                    'nombre_software' => 'required|max:50|min:3',
                    'file' => 'file|required'
                ];
                break;

            case 'Otros':
                return [
                    'nombre_otro' => 'required|max:255|min:3',
                    'file' => 'file|required'
                ];
                break;

            default:
                # code...
                break;
        }
        // dd($this);
        // dd($this->request);

    }

    public function messages()
    {
        return [
            'file.required' => __('messages.file_required'),
            'file.mimes' => __('messages.file_type')
        ];
    }
}
