<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\Config;


class ConfigController extends Controller
{
    //
    public function config(Request $request)
    {
        $request->validate([
            'idioma' => [
                Rule::in(['es', 'en'])
            ],
            'dia' => [
                Rule::in([1, 0])
            ]
        ], [
            'idioma.in' => trans('messages.language') . trans('messages.notexist'),
            'dia.in' => trans('messages.mode') . trans('messages.notexist')
        ]);

        $request->input('idioma') != null ? $idioma = $request->input('idioma') : $idioma = null;
        $request->input('dia') != null ? $dia = $request->input('dia') : $dia = null;

        if ($idioma != null) {
            $request->session()->put('locale', $idioma);
            app()->setLocale($idioma);
        }

        if ($dia != null) {
            $request->session()->put('dia', $dia);
        }

        $user = Auth::user();
        if ($user) {
            if ($idioma != null) {
                $config = Config::where(['idioma' => $idioma, 'dia_noche' => $user->config->dia_noche])->first();
            }
            if ($dia != null) {
                $config = Config::where(['idioma' => $user->config->idioma, 'dia_noche' => $dia])->first();
            }
            $user->config()->associate($config);
            $user->save();
        }
        // return redirect()->route('login');
        return redirect()->back();
    }
}
