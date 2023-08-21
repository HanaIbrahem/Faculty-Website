<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    //


    public function setLocale($locale)
    {
        if (in_array($locale, config('app.locales'))) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }
        return Redirect::back();
    }

    public function changeLanguage(Request $request)
    {
        // $validated = $request->validate([
        //     'language' => 'required',
        // ]);

        // \Session::put('language', $request->language);

        // return redirect()->back();

        $locale=$request->language;
        if (in_array($locale, config('app.locales'))) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }

        return Redirect::back();
    }

}