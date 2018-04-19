<?php

namespace App\Http\Controllers;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProcessoCreateRequest;
use App\Http\Requests\ProcessoUpdateRequest;
use App\Repositories\ProcessoRepository;
use App\Validators\ProcessoValidator;

/**
 * Class ProcessosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProcessosController extends Controller {

    protected $repository;
    protected $validator;

    /**
     * ProcessosController constructor.
     *
     * @param ProcessoRepository $repository
     * @param ProcessoValidator $validator
     */
    public function __construct(ProcessoRepository $repository, ProcessoValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $processos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $processos,
            ]);
        }

        return view('processos.index', compact('processos'));
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
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $processo = $this->repository->create($request->all());

            $response = [
                'message' => 'Processo created.',
                'data' => $processo->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $processo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $processo,
            ]);
        }

        return view('processos.show', compact('processo'));
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

        return view('processos.edit', compact('processo'));
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
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $processo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Processo updated.',
                'data' => $processo->toArray(),
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

        if (request()->wantsJson()) {

            return response()->json([
                        'message' => 'Processo deleted.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Processo deleted.');
    }

}
