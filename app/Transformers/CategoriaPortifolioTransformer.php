<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\CategoriaPortifolio;

/**
 * Class CategoriaPortifolioTransformer.
 *
 * @package namespace App\Transformers;
 */
class CategoriaPortifolioTransformer extends TransformerAbstract
{
    /**
     * Transform the CategoriaPortifolio entity.
     *
     * @param \App\Entities\CategoriaPortifolio $model
     *
     * @return array
     */
    public function transform(CategoriaPortifolio $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
