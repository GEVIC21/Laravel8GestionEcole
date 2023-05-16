<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Filiere
 * @package App\Models
 * @version May 16, 2023, 12:23 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $etudiants
 * @property string $libelle
 * @property integer $id_filiere
 */
class Filiere extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'filiere';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'id_filiere'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'id_filiere' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'nullable|string|max:25',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable',
        'created_at' => 'nullable',
        'id_filiere' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiants()
    {
        return $this->hasMany(\App\Models\Etudiant::class, 'id_filiere');
    }
}
