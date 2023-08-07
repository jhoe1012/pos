<?php

/**
 * NexoPOS Controller
 *
 * @since  1.0
 **/

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Models\Therapist;
use App\Services\TherapistService;
use Exception;
use Illuminate\Http\Request;

class TherapistsController extends DashboardController
{

    protected  $therapistService;

    public function __construct(TherapistService $therapistService)
    {
        parent::__construct();
        $this->therapistService = $therapistService;
    }

    public function getActive()
    {
        // $this->therapistService = new TherapistService;
        return $this->therapistService->getActive(50);
    }

    public function searchTherapist(Request $request )  {
        $search = $request->input( 'search' );
        $therapist = Therapist::where( 'full_name', 'ilike', '%' . $search . '%' )
            ->get();

        return $therapist;
    }
}
