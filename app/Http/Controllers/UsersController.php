<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
//use Prettus\Validator\Contracts\ValidatorInterface;
//use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller {

    protected $service;
    protected $repository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserService $service) {

        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = $this->repository->all();

        return view('sistema.user.index', [
            'users' => $users
        ]);
    }

    public function create() {

        return view('sistema.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request) {

        $request = $this->service->store($request->all());
        $usuario = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $user = $this->repository->find($id);

        return view('sistema.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $user = $this->repository->find($id);

        $birth = explode('-', $user->nascimento);
        $birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];
        $user->nascimento = $birth;

        return view('sistema.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id) {

        $request = $this->service->update($request->all(), $id);
        $usuario = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $request = $this->service->destroy($id);

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('user.index');
    }

    public function getUserXls() {

        $users = $this->repository->all();
        
        $data = array();

        foreach ($users as $user) {
            $data[][] = $user['cpf'];
            $data[][].= $user['nome'];
            $data[][].= $user['email'];
            $data[][].= $user['telefone'];
            $data[][].= $user['nascimento'];
            $data[][].= $user['sexo'];
            $data[][].= $user['descricao'];
        }
        
        \Excel::create('File', function($excel) use($data) {
            $excel->sheet('Sheet', function($sheet) use($data) {
                //Create rows
                $sheet->rows($data);
            });
        })->download('xls');
    }

}
