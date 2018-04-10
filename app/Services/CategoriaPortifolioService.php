<?php

namespace App\Services;

use App\Repositories\CategoriaPortifolioRepository;
use App\Validators\CategoriaPortifolioValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class CategoriaPortifolioService {

    private $repository;
    private $validator;

    public function __construct(CategoriaPortifolioRepository $repository, CategoriaPortifolioValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    public function remove_acentos($string, $separator = '-') {
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array('&' => 'and');
        $string = mb_strtolower(trim($string), 'UTF-8');
        $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
        $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        return $string;
    }

    public function store($data) {

        try {

            /* Url */
            $data['url'] = $this->remove_acentos($data['nome']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $categotia_portifolio = $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Categoria cadastrada',
                'data' => $categotia_portifolio,
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

            $data['url'] = $this->remove_acentos($data['nome']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $categotia_portifolio = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => 'Categoria atualizada',
                'data' => $categotia_portifolio,
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

    public function destroy($categoria_id) {

        try {

            $this->repository->delete($categoria_id);

            return [
                'success' => true,
                'message' => 'Categoria removida',
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
