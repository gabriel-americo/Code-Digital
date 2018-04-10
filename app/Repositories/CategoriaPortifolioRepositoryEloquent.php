<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoriaPortifolioRepository;
use App\Entities\CategoriaPortifolio;
use App\Validators\CategoriaPortifolioValidator;

/**
 * Class CategoriaPortifolioRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoriaPortifolioRepositoryEloquent extends BaseRepository implements CategoriaPortifolioRepository {

    public function selectBoxList(string $descricao = 'nome', string $chave = 'id') {
        return $this->model->pluck($descricao, $chave);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return CategoriaPortifolio::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return CategoriaPortifolioValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
