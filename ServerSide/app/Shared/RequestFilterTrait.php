<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


trait RequestFilterTrait
{
    public function filterByNationalNo(Request $request, Builder $query)
    {

        if ($request->has('national_no')) {
            $query->where('national_no', 'like', '%' . $request->input('national_no') . '%');
        }
    }

    public function filterByGender(Request $request, Builder $query)
    {
        if ($request->has('gender')) {
            $query->where('gender', $request->input('gender'));
        }
    }
}
