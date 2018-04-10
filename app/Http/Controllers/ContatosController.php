<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContatoCreateRequest;
use App\Http\Requests\ContatoUpdateRequest;
use App\Repositories\ContatoRepository;
use App\Validators\ContatoValidator;

/**
 * Class ContatosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ContatosController extends Controller
{
    /**
     * @var ContatoRepository
     */
    protected $repository;

    /**
     * @var ContatoValidator
     */
    protected $validator;

    /**
     * ContatosController constructor.
     *
     * @param ContatoRepository $repository
     * @param ContatoValidator $validator
     */
    public function __construct(ContatoRepository $repository, ContatoValidator $validator)
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
        $contatos = $this->repository->all();

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContatoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ContatoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $contato = $this->repository->create($request->all());

            $response = [
                'message' => 'Contato created.',
                'data'    => $contato->toArray(),
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
        $contato = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contato,
            ]);
        }

        return view('contatos.show', compact('contato'));
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
        $contato = $this->repository->find($id);

        return view('contatos.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContatoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ContatoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $contato = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Contato updated.',
                'data'    => $contato->toArray(),
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
                'message' => 'Contato deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Contato deleted.');
    }
}
