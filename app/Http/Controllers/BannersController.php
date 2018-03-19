<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannersCreateRequest;
use App\Http\Requests\BannersUpdateRequest;
use App\Repositories\BannersRepository;
use App\Validators\BannersValidator;
use App\Services\BannerService;

/**
 * Class BannersController.
 *
 * @package namespace App\Http\Controllers;
 */
class BannersController extends Controller {

    protected $repository;
    protected $service;
    protected $validator;

    /**
     * BannersController constructor.
     *
     * @param BannersRepository $repository
     * @param BannersValidator $validator
     */
    public function __construct(BannersRepository $repository, BannersValidator $validator, BannerService $service) {

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

        $banners = $this->repository->all();

        return view('sistema.banner.index', [
            'banners' => $banners
        ]);
    }

    public function create() {

        return view('sistema.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BannersCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BannersCreateRequest $request) {

        $request = $this->service->store($request->all());
        $banner = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $banner = $this->repository->find($id);

        return view('sistema.banner.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $banner = $this->repository->find($id);

        if(!empty($banner->data_inicio)) {
            $inicio = explode('-', $banner->data_inicio);
            $inicio = $inicio[2] . '/' . $inicio[1] . '/' . $inicio[0];
            $banner->data_inicio = $inicio;
        }

        if(!empty($banner->data_fim)) {
            $fim = explode('-', $banner->data_fim);
            $fim = $fim[2] . '/' . $fim[1] . '/' . $fim[0];
            $banner->data_fim = $fim;
        }

        return view('sistema.banner.edit', [
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BannersUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BannersUpdateRequest $request, $id) {

        $request = $this->service->update($request->all(), $id);
        $banner = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('banner.index');
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

        return redirect()->route('banner.index');
    }

}
