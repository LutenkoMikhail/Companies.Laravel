<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Start page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        return view('welcome', [
            'companiesTotal' => Company::all()->count(),
        ]);
    }
}
