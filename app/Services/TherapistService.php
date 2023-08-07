<?php

namespace App\Services;

use App\Models\Therapist;

class TherapistService
{
    public function getActive($limit = 30)
    {
        return  Therapist::where('is_active',  true)
            ->limit($limit)
            ->orderBy('first_name', 'asc')->get();
    }
}
