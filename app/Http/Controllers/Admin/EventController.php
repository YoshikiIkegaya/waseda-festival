<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Contracts\EventRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Event;

class EventController extends Controller
{
    protected $eventRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        EventRepositoryInterface $eventRepository
    ) {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventRepository->orderBy('from_time', 'asc')->all();
        
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($this->eventRepository->create($request->toArray())) {

                return json_encode([
                    'status' => 'true',
                    'data' => ['message' => 'Successful']
                ]);
            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return 'Failed';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy param id = ' . $id;
    }
}
