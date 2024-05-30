<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function toggleTheme(Request $request)
    {
        $theme = $request->cookie('theme') === 'dark' ? 'light' : 'dark';
        return redirect()->back()->withCookie(cookie('theme', $theme, 525600));
    }
}
