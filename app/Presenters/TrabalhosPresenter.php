<?php

namespace App\Presenters;

use App\Transformers\TrabalhosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TrabalhosPresenter.
 *
 * @package namespace App\Presenters;
 */
class TrabalhosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TrabalhosTransformer();
    }
}
