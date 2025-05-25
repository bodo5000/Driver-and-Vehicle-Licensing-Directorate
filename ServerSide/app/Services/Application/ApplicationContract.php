<?php

namespace App\Services\Application;

use Illuminate\Http\Request;

interface ApplicationContract
{
    public function all();
    public function latest();
    public function store(Request $request, int $applicationTypeID = null);
}
