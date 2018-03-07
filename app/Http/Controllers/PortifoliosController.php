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

/**
 * Class PortifoliosController.
 *
 * @package namespace App\Http\Controllers;
 */
class PortifoliosController extends Controller
{
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
    public function __construct(PortifoliosRepository $repository, PortifoliosValidator $validator)
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
        $portifolios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $portifolios,
            ]);
        }

        return view('portifolios.index', compact('portifolios'));
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
    public function store(PortifoliosCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $portifolio = $this->repository->create($request->all());

            $response = [
                'message' => 'Portifolios created.',
                'data'    => $portifolio->toArray(),
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
        $portifolio = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $portifolio,
            ]);
        }

        return view('portifolios.show', compact('portifolio'));
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
        $portifolio = $this->repository->find($id);

        return view('portifolios.edit', compact('portifolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PortifoliosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PortifoliosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $portifolio = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Portifolios updated.',
                'data'    => $portifolio->toArray(),
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
                'message' => 'Portifolios deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Portifolios deleted.');
    }
}
