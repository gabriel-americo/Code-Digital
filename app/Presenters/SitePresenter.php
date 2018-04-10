<?php

namespace App\Presenters;

use App\Transformers\SiteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SitePresenter.
 *
 * @package namespace App\Presenters;
 */
class SitePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SiteTransformer();
    }
}
