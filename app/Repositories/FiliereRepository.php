<?php

namespace App\Repositories;

use App\Models\Filiere;
use App\Repositories\BaseRepository;

/**
 * Class FiliereRepository
 * @package App\Repositories
 * @version May 16, 2023, 12:23 pm UTC
*/

class FiliereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'id_filiere'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Filiere::class;
    }
}
