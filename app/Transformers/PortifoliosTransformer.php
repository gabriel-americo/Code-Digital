<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Portifolios;

/**
 * Class PortifoliosTransformer.
 *
 * @package namespace App\Transformers;
 */
class PortifoliosTransformer extends TransformerAbstract
{
    /**
     * Transform the Portifolios entity.
     *
     * @param \App\Entities\Portifolios $model
     *
     * @return array
     */
    public function transform(Portifolios $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
