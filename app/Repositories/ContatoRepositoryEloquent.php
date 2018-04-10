<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ContatoRepository;
use App\Entities\Contato;
use App\Validators\ContatoValidator;

/**
 * Class ContatoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ContatoRepositoryEloquent extends BaseRepository implements ContatoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contato::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ContatoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
