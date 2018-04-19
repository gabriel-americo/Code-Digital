<?php

namespace App\Http\Controllers;


use App\Http\Requests\TrabalhosCreateRequest;
use App\Http\Requests\TrabalhosUpdateRequest;
use App\Repositories\TrabalhosRepository;
use App\Validators\TrabalhosValidator;
use App\Services\TrabalhoService;
use Auth;

/**
 * Class TrabalhosController.
 *
 * @package namespace App\Http\Controllers;
 */
class TrabalhosController extends Controller {

    protected $repository;
    protected $validator;
    protected $service;

    /**
     * TrabalhosController constructor.
     *
     * @param TrabalhosRepository $repository
     * @param TrabalhosValidator $validator
     */
    public function __construct(TrabalhosRepository $repository, TrabalhosValidator $validator, TrabalhoService $service) {
        
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $user_id = Auth::user()->id;
        
        $trabalhos = $this->repository->findWhere(['user_id' => $user_id]);

        return view('sistema.trabalho.index', [
            'trabalhos' => $trabalhos
        ]);
    }
    
    public function create() {

        return view('sistema.trabalho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TrabalhosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TrabalhosCreateRequest $request) {
        
        $request = $this->service->store($request->all());
        $trabalhos = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('trabalho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $trabalho = $this->repository->find($id);

        return view('trabalhos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $trabalho = $this->repository->find($id);

        return view('sistema.trabalho.edit', [
            'trabalho' => $trabalho,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TrabalhosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TrabalhosUpdateRequest $request, $id) {
        
        $request = $this->service->update($request->all(), $id);
        $trabalhos = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('trablhos.index');
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

        return redirect()->route('trabalhos.index');
    }

}
