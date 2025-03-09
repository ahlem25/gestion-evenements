<?php

namespace App\Repositories;

use App\Models\Registration;
use App\Repositories\BaseRepository;

class RegistrationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'registration_date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Registration::class;
    }
}
