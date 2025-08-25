<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function store(RegisterRequest $request)
    {
        $form = $request->all();
        User::create($form);

        return redirect('/admin');
    }
}
