<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Banners.
 *
 * @package namespace App\Entities;
 */
class Banners extends Model implements Transformable {

    use TransformableTrait;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'imagem', 'status', 'data_inicio', 'data_fim'];

    public function getFormattedStatusAttribute() {

        $ativo = $this->attributes['status'];

        if ($ativo == 1) {
            $ativo = "Ativo";
        } else {
            $ativo = "Desativo";
        }

        return $ativo;
    }

}
