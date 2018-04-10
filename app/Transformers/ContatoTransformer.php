<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Contato;

/**
 * Class ContatoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContatoTransformer extends TransformerAbstract
{
    /**
     * Transform the Contato entity.
     *
     * @param \App\Entities\Contato $model
     *
     * @return array
     */
    public function transform(Contato $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
