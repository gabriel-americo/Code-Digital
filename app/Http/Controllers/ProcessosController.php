<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessoCreateRequest;
use App\Http\Requests\ProcessoUpdateRequest;
use App\Repositories\ProcessoRepository;
use App\Validators\ProcessoValidator;
use App\Services\ProcessoService;

/**
 * Class ProcessosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProcessosController extends Controller {

    protected $repository;
    protected $service;
    protected $validator;

    /**
     * ProcessosController constructor.
     *
     * @param ProcessoRepository $repository
     * @param ProcessoValidator $validator
     */
    public function __construct(ProcessoRepository $repository, ProcessoValidator $validator, ProcessoService $service) {
        $this->repository = $repository;
        $this->service = $service;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $processos = $this->repository->all();

        return view('sistema.processo.index', [
            'processos' => $processos
        ]);
    }

    public function create() {

        return view('sistema.processo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProcessoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProcessoCreateRequest $request) {

        $request = $this->service->store($request->all());
        $processo = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('processo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $processo = $this->repository->find($id);

        return view('sistema.processo.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $processo = $this->repository->find($id);

        return view('sistema.processo.edit', [
            'processo' => $processo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcessoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProcessoUpdateRequest $request, $id) {

        $request = $this->service->update($request->all(), $id);
        $processo = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('processo.index');
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

        return redirect()->route('processo.index');
    }

}
