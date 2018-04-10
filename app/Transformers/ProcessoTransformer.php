<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Processo;

/**
 * Class ProcessoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProcessoTransformer extends TransformerAbstract
{
    /**
     * Transform the Processo entity.
     *
     * @param \App\Entities\Processo $model
     *
     * @return array
     */
    public function transform(Processo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
