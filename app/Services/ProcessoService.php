<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\ProcessoRepository;
use App\Validators\ProcessoValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class ProcessoService {

    private $repository;
    private $validator;

    public function __construct(ProcessoRepository $repository, ProcessoValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data) {

        try {

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $processo = $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Processo cadastrado',
                'data' => $processo,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class : return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class : return['success' => false, 'message' => $e->getMessage()];
                default : return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

    public function update($data, $id) {

        try {

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $processo = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => 'Processo atualizado',
                'data' => $processo,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class : return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class : return['success' => false, 'message' => $e->getMessage()];
                default : return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

    public function destroy($processo_id) {

        try {

            $this->repository->delete($processo_id);

            return [
                'success' => true,
                'message' => 'Processo removido',
                'data' => null,
            ];
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class : return ['success' => false, 'message' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'message' => $e->getMessageBag()];
                case Exception::class : return['success' => false, 'message' => $e->getMessage()];
                default : return ['success' => false, 'message' => $e->getMessage()];
            }
        }
    }

}
