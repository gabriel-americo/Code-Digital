<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\BannersRepository;
use App\Repositories\DestaqueRepository;
use App\Repositories\ContatoRepository;
use App\Validators\UserValidator;
use Auth;

class DashboardController extends Controller {

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator, BannersRepository $r_banner, DestaqueRepository $r_destaque, ContatoRepository $r_contato) {
        
        $this->repository = $repository;
        $this->r_banner = $r_banner;
        $this->r_destaque = $r_destaque;
        $this->r_contato = $r_contato;
        $this->validator = $validator;
    }

    public function index() {

    $count_user = $this->repository->all()->count();
    $count_banner = $this->r_banner->all()->count();
    $count_destaque = $this->r_destaque->all()->count();
    $count_contato = $this->r_contato->all()->count();
        
        return view('sistema.index', [
            'count_user' => $count_user,
            'count_banner' => $count_banner,
            'count_destaque' => $count_destaque,
            'count_contato' => $count_contato
        ]);
    }

    public function fazerLogin() {

        $title = "Code Digital | Sistema";

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
