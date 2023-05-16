<?php

namespace App\Repositories;

use App\Models\Etudiants;
use App\Repositories\BaseRepository;

/**
 * Class EtudiantsRepository
 * @package App\Repositories
 * @version May 16, 2023, 12:09 pm UTC
*/

class EtudiantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Etudiants::class;
    }
}
