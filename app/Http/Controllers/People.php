<?php

namespace App\Http\Controllers;

use App\People as PeopleEntity;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

class People extends Controller
{
    public function getPeople(): Collection
    {
        return PeopleEntity::all();
    }

    public function createPeople(Request $request): PeopleEntity
    {
        $people = new PeopleEntity($request->all());

        $people->save();

        return $people;
    }

    public function deletePeople(int $peopleId): void
    {
        /** @var PeopleEntity $people */
        $people = PeopleEntity::query()->where('id', '=', $peopleId)->get()->first();

        if (!$people) {
            throw new \InvalidArgumentException(
                sprintf('Trying to delete People entity that does not exist with id `%s`', $peopleId)
            );
        }

        $people->delete();
    }
}
