<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\TrabalhosRepository;
use App\Validators\TrabalhosValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;
use Auth;

class TrabalhoService {

    private $repository;
    private $validator;

    public function __construct(TrabalhosRepository $repository, TrabalhosValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data) {

        try {

            /* Imagem */
            $file = $data['imagem'];
            $destinationPath = 'img/trabalho';

            //Move Uploaded File
            $file->move($destinationPath, $file->getClientOriginalName());
            $data['imagem'] = $file->getClientOriginalName();

            $data['user_id'] = Auth::user()->id;

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $trabalho = $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Trabalho cadastrado',
                'data' => $trabalho,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class :
                    return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                default :
                    return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

    public function update($data, $id) {

        try {

            if (!empty($data['imagem'])) {

                /* Imagem */
                $file = $data['imagem'];
                $destinationPath = 'img/background';

                /* Move Uploaded File */
                $file->move($destinationPath, $file->getClientOriginalName());
                $data['imagem'] = $file->getClientOriginalName();
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $trabalho = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => 'Trabalho atualizado',
                'data' => $trabalho,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class :
                    return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                default :
                    return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

    public function destroy($trabalho_id) {

        try {

            $this->repository->delete($trabalho_id);

            return [
                'success' => true,
                'message' => 'Trabalho removido',
                'data' => null,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class :
                    return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class :
                    return ['success' => false, 'message' => $e->getMessage()];
                default :
                    return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

}
