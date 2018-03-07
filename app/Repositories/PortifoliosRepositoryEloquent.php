<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PortifoliosRepository;
use App\Entities\Portifolios;
use App\Validators\PortifoliosValidator;

/**
 * Class PortifoliosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PortifoliosRepositoryEloquent extends BaseRepository implements PortifoliosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Portifolios::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PortifoliosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
