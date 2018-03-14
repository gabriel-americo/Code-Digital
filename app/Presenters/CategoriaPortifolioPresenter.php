<?php

namespace App\Presenters;

use App\Transformers\CategoriaPortifolioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriaPortifolioPresenter.
 *
 * @package namespace App\Presenters;
 */
class CategoriaPortifolioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoriaPortifolioTransformer();
    }
}
