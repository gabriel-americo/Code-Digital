<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class UserService {

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data) {

        try {

            /* Date */
            $birth = explode('/', $data['birth']);
            $birth = $birth[2] . '-' . $birth[1] . '-' . $birth[0];
            ;
            $data['birth'] = $birth;

            /* CPF */
            $cpf = str_replace('.', '', $data['cpf']);
            $cpf = str_replace('-', '', $cpf);
            $data['cpf'] = $cpf;

            /* Fone */
            $phone = str_replace('(', '', $data['phone']);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('-', '', $phone);
            $data['phone'] = $phone;

            /* Password */
            $pass = bcrypt($data['password']);
            $data['password'] = $pass;

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $usuario = $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Usuário cadastrado',
                'data' => $usuario,
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
            
            /* Date */
            $birth = explode('/', $data['birth']);
            $birth = $birth[2] . '-' . $birth[1] . '-' . $birth[0];
            ;
            $data['birth'] = $birth;

            /* CPF */
            $cpf = str_replace('.', '', $data['cpf']);
            $cpf = str_replace('-', '', $cpf);
            $data['cpf'] = $cpf;

            /* Fone */
            $phone = str_replace('(', '', $data['phone']);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('-', '', $phone);
            $data['phone'] = $phone;

            /* Password */
            $pass = bcrypt($data['password']);
            $data['password'] = $pass;

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $usuario = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => 'Usúario atualizado',
                'data' => $usuario,
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

    public function destroy($user_id) {

        try {

            $this->repository->delete($user_id);

            return [
                'success' => true,
                'message' => 'Usúario removido',
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
