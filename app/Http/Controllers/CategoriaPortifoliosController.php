<?php

namespace App\Http\Controllers;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoriaPortifolioCreateRequest;
use App\Http\Requests\CategoriaPortifolioUpdateRequest;
use App\Repositories\CategoriaPortifolioRepository;
use App\Validators\CategoriaPortifolioValidator;
use App\Services\CategoriaPortifolioService;

/**
 * Class CategoriaPortifoliosController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriaPortifoliosController extends Controller {

    /**
     * @var CategoriaPortifolioRepository
     */
    protected $repository;

    /**
     * @var CategoriaPortifolioValidator
     */
    protected $validator;

    /**
     * CategoriaPortifoliosController constructor.
     *
     * @param CategoriaPortifolioRepository $repository
     * @param CategoriaPortifolioValidator $validator
     */
    public function __construct(CategoriaPortifolioRepository $repository, CategoriaPortifolioValidator $validator, CategoriaPortifolioService $service) {
        
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

        $categoriaPortifolios = $this->repository->all();

        return view('categoriaPortifolios.index', [
            'categoriaPortifolios' => $categoriaPortifolios
        ]);
    }

    public function create() {

        return view('sistema.categoria-portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoriaPortifolioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CategoriaPortifolioCreateRequest $request) {

        $request = $this->service->store($request->all());
        $categoria_portifolio = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('portifolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $categoriaPortifolio = $this->repository->find($id);

        return view('categoriaPortifolios.show', compact('categoriaPortifolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $categoriaPortifolio = $this->repository->find($id);

        return view('categoriaPortifolios.edit', compact('categoriaPortifolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriaPortifolioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CategoriaPortifolioUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categoriaPortifolio = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CategoriaPortifolio updated.',
                'data' => $categoriaPortifolio->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $deleted = $this->repository->delete($id);

        return redirect()->back()->with('message', 'CategoriaPortifolio deleted.');
    }

}
