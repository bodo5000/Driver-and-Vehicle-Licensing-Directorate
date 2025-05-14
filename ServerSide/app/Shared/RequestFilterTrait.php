<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


trait RequestFilterTrait
{
    private function IsRequestHas(Request $request, string $urlQuery)
    {
        return $request->has($urlQuery);
    }

    public function filterByNationalNo(Request $request, Builder $query)
    {
        if ($this->IsRequestHas($request, 'national_no')) {
            $query->where('national_no', 'like', '%' . $request->input('national_no') . '%');
        }
    }

    public function filterByID(Request $request, Builder $query)
    {
        if ($this->IsRequestHas($request, 'id')) {
            $query->where('id', $request->input('id'));
        }
    }

    public function filterByGender(Request $request, Builder $query)
    {
        if ($this->IsRequestHas($request, 'gender')) {
            $query->where('gender', $request->input('gender'));
        }
    }
}
