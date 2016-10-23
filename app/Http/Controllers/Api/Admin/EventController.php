<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Repositories\Contracts\EventRepositoryInterface;
use App\Http\Controllers\Controller;
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
        $data = $this->eventRepository->orderBy('from_time', 'asc')->all();
        
        return response()->json($data, 200, ['Content-Type' => 'application/json; charset=UTF-8', 'charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
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

    public function showOnDay($day)
    {
        $data = $this->eventRepository->orderBy('from_time', 'asc')->findAllBy('day', $day);

        return response()->json($data, 200, ['Content-Type' => 'application/json; charset=UTF-8', 'charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
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
        if ($delete) {
            # code...
        }

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
        try {
            if ($this->eventRepository->find($id)->delete()) {
                
                return json_encode([
                    'status' => 'true',
                    'data' => ['message' => 'Successful']
                ]);
            }
            
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return 'destroy param id = ' . $id;
    }
}
