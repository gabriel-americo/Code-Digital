<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SiteCreateRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Repositories\SiteRepository;
use App\Validators\SiteValidator;

/**
 * Class SitesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SitesController extends Controller
{
    /**
     * @var SiteRepository
     */
    protected $repository;

    /**
     * @var SiteValidator
     */
    protected $validator;

    /**
     * SitesController constructor.
     *
     * @param SiteRepository $repository
     * @param SiteValidator $validator
     */
    public function __construct(SiteRepository $repository, SiteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('sistema.site.index');
    }

}
