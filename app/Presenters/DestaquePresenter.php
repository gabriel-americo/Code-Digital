<?php

namespace App\Presenters;

use App\Transformers\DestaqueTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DestaquePresenter.
 *
 * @package namespace App\Presenters;
 */
class DestaquePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DestaqueTransformer();
    }
}
