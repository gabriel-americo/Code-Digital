<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function getFormattedDataInicioAttribute() {

        $data_inicio = explode('-', $this->attributes['data_inicio']);

        if (count($data_inicio) != 3) {
            return "";
        }
        $data_inicio = $data_inicio[2] . '/' . $data_inicio[1] . '/' . $data_inicio[0];

        return $data_inicio;
    }

    public function getFormattedDataFimAttribute() {

        $data_fim = explode('-', $this->attributes['data_fim']);

        if (count($data_fim) != 3) {
            return "";
        }
        $data_fim = $data_fim[2] . '/' . $data_fim[1] . '/' . $data_fim[0];

        return $data_fim;
    }

}
