<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DestaqueRepository;
use App\Entities\Destaque;
use App\Validators\DestaqueValidator;

/**
 * Class DestaqueRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DestaqueRepositoryEloquent extends BaseRepository implements DestaqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Destaque::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DestaqueValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
