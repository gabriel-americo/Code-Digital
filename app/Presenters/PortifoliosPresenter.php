<?php

namespace App\Presenters;

use App\Transformers\PortifoliosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PortifoliosPresenter.
 *
 * @package namespace App\Presenters;
 */
class PortifoliosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PortifoliosTransformer();
    }
}
