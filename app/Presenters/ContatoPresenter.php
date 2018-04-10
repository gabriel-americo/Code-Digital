<?php

namespace App\Presenters;

use App\Transformers\ContatoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContatoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContatoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContatoTransformer();
    }
}
