<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Trabalhos.
 *
 * @package namespace App\Entities;
 */
class Trabalhos extends Model implements Transformable {

    use TransformableTrait;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'trabalhos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'nome', 'imagem', 'descricao'];

}
