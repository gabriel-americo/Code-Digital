<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Destaque;

/**
 * Class DestaqueTransformer.
 *
 * @package namespace App\Transformers;
 */
class DestaqueTransformer extends TransformerAbstract
{
    /**
     * Transform the Destaque entity.
     *
     * @param \App\Entities\Destaque $model
     *
     * @return array
     */
    public function transform(Destaque $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
