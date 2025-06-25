<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Event;
use App\Models\Location;
use App\Models\Organizer;
use App\Models\Speaker;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();
        return view("events")->with("events", $events);
    }

    public function adminIndex(Request $request)
    {

        if ($request->ajax()) {
            $query = Event::query()->with("category", "location", "speaker", "organizer");
            return Datatables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "";

                    $btn .= '<a href="' . route("admin.events.edit", ["event" => $row->id]) . '"
                            class="btn btn-block btn-outline-primary"  data-position="top" data-tooltip="Editer">
                            <i class="material-icons">Modifier</i> </a>';
                    $btn .= '<a href="javascript:void(0)"  data-id="' . $row->id . '"
                        data-message="' . "Cliquez sur Oui pour supprimer l évènements= N° " . $row->id . '"
                        data-route="' . route("admin.events.destroy", ["event" => $row->id]) . '"
                            class="destroy btn btn-block btn-outline-danger tooltipped  "  data-position="top" data-tooltip="Supprimer">
                            <i class="material-icons">Supprimer</i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("administration.events");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $organizers = Organizer::all();
        $categories = Category::all();
        $locations = Location::all();
        $speakers = Speaker::all();
        return view("administration.events-create", compact("locations", "categories", "organizers", "speakers"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = self::validation($request);
        if ($validation != null) {
            Alert::error('Erreur', $validation);
            return redirect()->back();
        }
        $event = new Event();
        $event->name = $request->name;
        $event->location_id = $request->location;
        $event->category_id = $request->category;
        $event->organizer_id = $request->organizer;
        $event->price = $request->price;
        $event->date = new Carbon($request->date);
        $event->speaker_id = $request->speaker;
        $event->save();
        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //

        return view("events_show")->with("test", $event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //

        $organizers = Organizer::all();
        $categories = Category::all();
        $locations = Location::all();
        $speakers = Speaker::all();
        return view("administration.events-edit", compact("event", "locations", "categories", "organizers", "speakers"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        //
        $validation = self::validation($request, "," . $event->id);
        if ($validation != null) {
            Alert::error('Erreur', $validation);
            return redirect()->back();
        }
        try {
            $event->name = $request->name;
            $event->location_id = $request->location;
            $event->category_id = $request->category;
            $event->organizer_id = $request->organizer;
            $event->price = $request->price;
            $event->date = new Carbon($request->date);
            $event->speaker_id = $request->speaker;
            $event->save();
            Alert::success('Succès', "event modifié avec succès");
        } catch (Exception $exception) {
            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        {
            DB::beginTransaction();
            try {
                $event->delete();
                DB::commit();
                return Response::json(["error" => false]);
            } catch
            (Exception $e) {
                Log::debug($e);
                $error = ["error" => true, "message" => "Une erreur est survenue !"];
                if ($e instanceof QueryException) {
                    if ($e->errorInfo[1] == 1451) {
                        $error["message"] = "Impossible de supprimer cet élément car il est affecté à d'autres éléments";
                    }
                }
                DB::rollback();
                return Response::json($error);
            }
        }
    }

    private function validation(Request $request, $id = '')
    {
        $param = [
            'name' => ['max:150', 'required', 'string', 'unique:events,name' . $id],
            'organizer' => ['max:150', 'required', 'string', 'unique:organizers,name' . $id],
            'date' => ["date", "required", "after_or_equal:today"],
            'price' => ["numeric", "required", "min:0"],
            'location' => ["numeric", "required", "exists:locations,id"],

        ];
        $attributeNames = ['name' => 'Nom', 'price' => 'prix', 'location_id' => "emplacement"];
        $validator = Validator::make($request->all(), $param);
        if ($attributeNames != null) {
            $validator->setAttributeNames($attributeNames);
        }
        if ($validator->errors()->any()) {
            $text = "";
            foreach ($validator->errors()->all() as $error) {
                Log::debug($error);
                $text .= $error . "\n ";
            }

            return $text;
        }

    }
}


