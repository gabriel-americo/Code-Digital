<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TrabalhosRepository;
use App\Entities\Trabalhos;
use App\Validators\TrabalhosValidator;

/**
 * Class TrabalhosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TrabalhosRepositoryEloquent extends BaseRepository implements TrabalhosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Trabalhos::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TrabalhosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
