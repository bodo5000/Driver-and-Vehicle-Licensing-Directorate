<?php
namespace App\Repositories\Person;

use App\Models\Person;
use Illuminate\Http\Request;

interface PersonInterface
{
    public function getAllPeople();
    public function getAllLatest();
    public function create(array $attributes);
    public function getById(string $id);
    public function getByNationalNo(string $national_no);
    public function update(array $attributes, Person $person);
    public function destroy(Person $person);
    public function filter(Request $request);
}
