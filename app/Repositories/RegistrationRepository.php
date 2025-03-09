<?php

namespace App\Repositories;

use App\Models\Registration;
use App\Repositories\BaseRepository;

class RegistrationRepository extends BaseRepository
{
    public function __construct(Registration $registration)
    {
        $this->setModel($registration);
    }
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
