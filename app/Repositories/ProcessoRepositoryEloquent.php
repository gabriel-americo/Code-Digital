<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProcessoRepository;
use App\Entities\Processo;
use App\Validators\ProcessoValidator;

/**
 * Class ProcessoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProcessoRepositoryEloquent extends BaseRepository implements ProcessoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Processo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProcessoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
