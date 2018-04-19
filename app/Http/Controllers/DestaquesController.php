<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestaqueCreateRequest;
use App\Http\Requests\DestaqueUpdateRequest;
use App\Repositories\DestaqueRepository;
use App\Validators\DestaqueValidator;

/**
 * Class DestaquesController.
 *
 * @package namespace App\Http\Controllers;
 */
class DestaquesController extends Controller {

    protected $repository;
    protected $validator;

    /**
     * DestaquesController constructor.
     *
     * @param DestaqueRepository $repository
     * @param DestaqueValidator $validator
     */
    public function __construct(DestaqueRepository $repository, DestaqueValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $destaques = $this->repository->all();

        return view('sistema.destaque.index', [
            'destaques' => $destaques
        ]);
    }

    public function create() {

        return view('sistema.destaque.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DestaqueCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DestaqueCreateRequest $request) {

        $request = $this->service->store($request->all());
        $destaque = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('destaque.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $destaque = $this->repository->find($id);

        return view('destaques.show', compact('destaque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $destaque = $this->repository->find($id);

        return view('sistema.destaque.edit', [
            'destaque' => $destaque,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DestaqueUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DestaqueUpdateRequest $request, $id) {
        
        $request = $this->service->update($request->all(), $id);
        $destaque = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('destaque.index');
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

        return redirect()->route('destaque.index');
    }

}
