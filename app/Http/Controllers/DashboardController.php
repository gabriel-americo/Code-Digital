<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

class DashboardController extends Controller {

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index() {
        return view('sistema.index');
    }

    public function fazerLogin() {

        $title = "Sistema | Dashboard";

        return view('sistema.login', [
            'title' => $title,
        ]);
    }

    public function auth(Request $request) {

        $data = [
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ];

        $user = $this->repository->findWhere(['email' => $request->get('username')])->first();

        if (Auth::attempt($data)) {
            Auth::login($user);
            return redirect()->route('sistema.index');
        } else {
            if (!$user) {
                $message = "O e-mail informado é inválido!";
            } else {
                $message = "A senha informada é inválida!";
            }

            session()->flash('login_message', [
                'message' => $message
            ]);

            return redirect()->route('sistema.login');
        }

    }

    public function logout() {

        Auth::logout();

        session()->flash('login_message', [
            'message' => "Você saiu do sistema!"
        ]);

        return redirect()->route('sistema.login');
    }

}
