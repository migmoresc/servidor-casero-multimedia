<?php

namespace App\Http\Controllers;

use App\Models\Condicion;
use App\Models\DatosUsuario;
use App\Models\Usuario;
use App\Models\Config;
use App\Models\UsuarioVerificado;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Faker;
use Closure;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    //
    // public function mostrar(Request $request)
    // {
    //     if ($request->path() == "registrarse") {
    //         return view('usuarios.mostrar');
    //     } else if ($request->path() == "entrar") {
    //         return view('usuarios.login');
    //     }
    // }

    public function autenticar(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'username' => ['required', 'max:20'],
            'password' => ['required', 'max:60'],
            'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config(key: 'services.recaptcha.secret_key'),
                    'response' => $value,
                    // 'remoteip' => $request->ip()
                ]);
                // dd($g_response->json());
                if (!$g_response->json(key: 'success')) {
                    $fail("The {$attribute} is invalid.");
                }
            }]
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->put('locale', Auth::user()->config->idioma);
            $request->session()->put('dia', Auth::user()->config->dia);
            return redirect()->route('usuario.home.principal');
        } else {
            // dd("A");
            return redirect()->route('login')->withErrors(['fail_login' => trans('messages.login_error')]);
        }
    }

    public function salir(Request $request)
    {
        Auth::logout(Auth::user());
        return redirect()->route('login');
    }

    public function principal(Request $request)
    {
        return view('home');
    }

    public function guardar(Request $request)
    {
        $faker = Faker\Factory::create();

        // return $request;

        $request->validate([
            'username' => 'required|unique:usuarios|max:20',
            'password' => 'required|max:60',
            'condiciones' => 'required',
            'email' => 'required|unique:datos_usuarios',
            'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config(key: 'services.recaptcha.secret_key'),
                    'response' => $value,
                    // 'remoteip' => $request->ip()
                ]);
                // dd($g_response->json());
                if (!$g_response->json(key: 'success') || $g_response->json(key: 'score') <= 0.7) {
                    $fail("The {$attribute} is invalid.");
                }
            }],
            'codigo' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                $d_u = DatosUsuario::where('cod_invitacion', $value)->first();
                if (!$d_u) {
                    $fail(trans('messages.invite_code_fail'));
                }
            }],
        ]);

        $usuario = new Usuario();
        $usuario->username = $request->username;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = -1;

        $datos_usuario = new DatosUsuario();
        $datos_usuario->email = $request->email;
        $datos_usuario->ip_de_registro = $request->getClientIp();
        $datos_usuario->cod_invitacion = $faker->text(6);
        $datos_usuario->num_inv_restantes = 1;

        $usuario_verificado = new UsuarioVerificado();
        $usuario_verificado->url_verificado = $faker->uuid();

        $usuario->save();
        $usuario->datos_usuario()->save($datos_usuario);
        $usuario->usuario_verificado()->save($usuario_verificado);

        $email = $datos_usuario->email;

        Mail::html(trans('messages.activate_link', ['url' => route('usuario.verificar.verificar'), 'link' => $usuario_verificado->url_verificado]), function ($message) use ($email) {
            $message->from('soporte@migmoresc.com', 'Soporte')
                ->to($email, '')
                ->subject(trans('messages.activate_account'));
        });

        // $html = '<h1>hola</h1>asdf';

        // Mail::html($html, function ($message) {
        //     $message->from('soporte@migmoresc.com', 'Soporte')
        //         ->to('godswindregistro@gmail.com', 'Miguel')
        //         ->subject('Activar cuenta');
        // });

        //$usuario->create($request->all());
        return redirect()->route('usuario.verificar.verificar');
    }

    public function verificar(Request $request)
    {
        return view('verificar');
    }

    public function verificar_codigo(Request $request, string $cod)
    {
        $uv = UsuarioVerificado::where('url_verificado', $cod)->first();

        if ($uv) {
            $uv->usuario->tipo = 1;
            $uv->usuario->config()->associate(Config::where('idioma', 'es')->where('dia_noche', 1)->first());
            $uv->usuario->save();
            $uv->usuario->datos_usuario->email_verificado_fecha = new DateTime('now');
            $cond = Condicion::all()->sortByDesc('updated_at')->first();
            $uv->usuario->datos_usuario->condiciones()->attach($cond, ['aceptado' => 1]);
            $uv->usuario->datos_usuario->save();
            $uv->delete();
            return '<div class="centrado">' . trans('messages.activated_account') . '</div><script>setTimeout(function() {window.location.href = "' . route('login') . '";}, 2000);</script>';
        } else {
            return '<div class="centrado">' . trans('messages.error_activated_account') . '</div><script>setTimeout(function() {window.location.href = "' . route('login') . '";}, 2000);</script>';
        }
    }

    public function modificar($id)
    {
    }

    public function eliminar($id)
    {
    }

    public function reporte(Request $request)
    {
        // return response()->json(['mensaje' => $request->mensaje]);
        Mail::raw($request->mensaje, function ($message) {
            $message->from('soporte@migmoresc.com', 'Soporte');
            $message->to('godswindregistro@gmail.com', 'Miguel');
            $message->subject('Reporte');
        });
        // Lang::get('messages.message_send')
        return response()->json(['mensaje' => trans('messages.message_send')]);
    }

    public function condiciones_mostrar(Request $request)
    {

        // return Condicion::all()->sortBy('updated_at');
        return view('condiciones', ['texto' => Condicion::all()->sortByDesc('updated_at')->first()->texto]);
    }
}
