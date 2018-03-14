<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable {

    use Notifiable;
    #use SoftDeletes;

    public $timestamps = true;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cpf', 'nome', 'telefone', 'nascimento', 'sexo', 'descricao', 'email', 'password', 'status', 'permission', 'imagem'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute() {

        $cpf = $this->attributes['cpf'];

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, -2);
    }

    public function getFormattedTelefoneAttribute() {

        $phone = $this->attributes['telefone'];

        return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, -4);
    }

    public function getFormattedNascimentoAttribute() {

        $birth = explode('-', $this->attributes['nascimento']);

        if (count($birth) != 3) {
            return "";
        }
        $birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];

        return $birth;
    }

    public function getFormattedSexoAttribute() {

        $gender = $this->attributes['sexo'];

        if ($gender == 'M') {
            $gender = "Masculino";
        } else {
            $gender = "Feminino";
        }

        return $gender;
    }

}
