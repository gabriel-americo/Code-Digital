<?php

namespace App\Presenters;

use App\Transformers\ProcessoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProcessoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProcessoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProcessoTransformer();
    }
}
