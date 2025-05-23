<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;

/**
 * @group Public endpoints
 */
class TravelController extends Controller
{
    /**
     * GET Travels
     *
     * Returns paginated list of travels.
     *
     * @queryParam page integer Page number. Example: 1
     *
     * @response {"data":[{"id":"123","name":"First travel","slug":"first-travel","description":"Great offer!","number_of_days":5,"number_of_nights":4},{"id":"124","name":"New travel","slug":"new-travel","description":"The best journey ever!","number_of_days":3,"number_of_nights":2}],"links":{"first":"http://localhost/api/v1/travels?page=1","last":"http://localhost/api/v1/travels?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":1,"last_page":1,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http://localhost/api/v1/travels?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}],"path":"http://localhost/api/v1/travels","per_page":15,"to":6,"total":6}}
     */
    public function index()
    {
        $travels = Travel::where('is_public', true)->paginate();

        return TravelResource::collection($travels);
    }
}
