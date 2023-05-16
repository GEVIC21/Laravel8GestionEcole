<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Etudiant
 * @package App\Models
 * @version May 16, 2023, 12:22 pm UTC
 *
 * @property \App\Models\Filiere $idFiliere
 * @property string $nom
 * @property string $prenom
 * @property integer $age
 * @property string $nationalite
 * @property integer $id_filiere
 */
class Etudiant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiant';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'age',
        'nationalite',
        'id_filiere'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'age' => 'integer',
        'nationalite' => 'string',
        'id_filiere' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:25',
        'prenom' => 'nullable|string|max:25',
        'age' => 'nullable|integer',
        'nationalite' => 'nullable|string|max:30',
        'id_filiere' => 'nullable|integer',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable',
        'created_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idFiliere()
    {
        return $this->belongsTo(\App\Models\Filiere::class, 'id_filiere');
    }
}
