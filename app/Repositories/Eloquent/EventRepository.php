<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\EventRepositoryInterface;
use App\Models\Event;

class EventRepository extends Repository implements EventRepositoryInterface
{
    public function model()
    {
        return \App\Models\Event::class;
    }
}
