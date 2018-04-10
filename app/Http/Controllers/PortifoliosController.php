<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PortifoliosCreateRequest;
use App\Http\Requests\PortifoliosUpdateRequest;
use App\Repositories\PortifoliosRepository;
use App\Validators\PortifoliosValidator;
use App\Entities\CategoriaPortifolio;
use App\Repositories\CategoriaPortifolioRepository;

/**
 * Class PortifoliosController.
 *
 * @package namespace App\Http\Controllers;
 */
class PortifoliosController extends Controller {

    /**
     * @var PortifoliosRepository
     */
    protected $repository;

    /**
     * @var PortifoliosValidator
     */
    protected $validator;

    /**
     * PortifoliosController constructor.
     *
     * @param PortifoliosRepository $repository
     * @param PortifoliosValidator $validator
     */
    public function __construct(PortifoliosRepository $repository, PortifoliosValidator $validator, CategoriaPortifolioRepository $CategoriaPortifolioRepository) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->CategoriaPortifolioRepository = $CategoriaPortifolioRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $portfolios = $this->repository->all();
        $categorias = CategoriaPortifolio::all();

        return view('sistema.portfolio.index', [
            'portfolios' => $portfolios,
            'categorias' => $categorias
        ]);
    }

    public function create() {
        
        $categoria_list = $this->CategoriaPortifolioRepository->selectBoxList();
        
        /* $id = CategoriaPortifolio::find($id);
        
        dd($id); */

        return view('sistema.portfolio.create', [
            'categoria_list' => $categoria_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PortifoliosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PortifoliosCreateRequest $request) {

        $request = $this->service->store($request->all());
        $portifolio = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
        ]);

        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $portifolio = $this->repository->find($id);

        return view('portifolios.show', compact('portifolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $portifolio = $this->repository->find($id);

        return view('portifolios.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PortifoliosUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PortifoliosUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $portifolio = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Portifolios updated.',
                'data' => $portifolio->toArray(),
            ];

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

        return redirect()->back()->with('message', 'Portifolios deleted.');
    }

}
