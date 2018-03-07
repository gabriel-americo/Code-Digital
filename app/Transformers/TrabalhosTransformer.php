<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Trabalhos;

/**
 * Class TrabalhosTransformer.
 *
 * @package namespace App\Transformers;
 */
class TrabalhosTransformer extends TransformerAbstract
{
    /**
     * Transform the Trabalhos entity.
     *
     * @param \App\Entities\Trabalhos $model
     *
     * @return array
     */
    public function transform(Trabalhos $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
