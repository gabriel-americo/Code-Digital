<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TrabalhosCreateRequest;
use App\Http\Requests\TrabalhosUpdateRequest;
use App\Repositories\TrabalhosRepository;
use App\Validators\TrabalhosValidator;

/**
 * Class TrabalhosController.
 *
 * @package namespace App\Http\Controllers;
 */
class TrabalhosController extends Controller
{
    /**
     * @var TrabalhosRepository
     */
    protected $repository;

    /**
     * @var TrabalhosValidator
     */
    protected $validator;

    /**
     * TrabalhosController constructor.
     *
     * @param TrabalhosRepository $repository
     * @param TrabalhosValidator $validator
     */
    public function __construct(TrabalhosRepository $repository, TrabalhosValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $trabalhos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $trabalhos,
            ]);
        }

        return view('trabalhos.index', compact('trabalhos'));
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
    public function store(TrabalhosCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $trabalho = $this->repository->create($request->all());

            $response = [
                'message' => 'Trabalhos created.',
                'data'    => $trabalho->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
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
    public function show($id)
    {
        $trabalho = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $trabalho,
            ]);
        }

        return view('trabalhos.show', compact('trabalho'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabalho = $this->repository->find($id);

        return view('trabalhos.edit', compact('trabalho'));
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
    public function update(TrabalhosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $trabalho = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Trabalhos updated.',
                'data'    => $trabalho->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Trabalhos deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Trabalhos deleted.');
    }
}
