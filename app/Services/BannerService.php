<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\BannersRepository;
use App\Validators\BannersValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class BannerService {

    private $repository;
    private $validator;

    public function __construct(BannersRepository $repository, BannersValidator $validator) {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data) {

        try {

            $file = $data['imagem'];
            $destinationPath = 'img/background';

            //Move Uploaded File
            $file->move($destinationPath, $file->getClientOriginalName());
            $data['imagem'] = $file->getClientOriginalName();

            $data['status'] = (isset($data['status']) == '1' ? '1' : '0');

            /* Data inicio */
            if(isset($data['data_inicio'])) {
                $inicio = explode('/', $data['data_inicio']);
                $inicio = $inicio[2] . '-' . $inicio[1] . '-' . $inicio[0];
                $data['data_inicio'] = $inicio;
            }

            /* Data fim */
            if(isset($data['data_fim'])) {
                $fim = explode('/', $data['data_fim']);
                $fim = $fim[2] . '-' . $fim[1] . '-' . $fim[0];
                $data['data_fim'] = $fim;
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $banner = $this->repository->create($data);

            return [
                'success' => true,
                'message' => 'Banner cadastrado',
                'data' => $banner,
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

            $file = $data['imagem'];

            if (!empty($file)) {

                //Move Uploaded File
                $destinationPath = 'img/background';
                $file->move($destinationPath, $file->getClientOriginalName());

                $data['imagem'] = $file->getClientOriginalName();
            }

            /* Data inicio */
            $inicio = explode('/', $data['data_inicio']);
            $inicio = $inicio[2] . '-' . $inicio[1] . '-' . $inicio[0];
            $data['data_inicio'] = $inicio;

            /* Data fim */
            $fim = explode('/', $data['data_fim']);
            $fim = $fim[2] . '-' . $fim[1] . '-' . $fim[0];
            $data['data_fim'] = $fim;

            $data['status'] = (isset($data['status']) == '1' ? '1' : '0');

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $banner = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => 'Banner atualizado',
                'data' => $banner,
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

    public function destroy($banner_id) {

        try {

            $this->repository->delete($banner_id);

            return [
                'success' => true,
                'message' => 'Banner removido',
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
