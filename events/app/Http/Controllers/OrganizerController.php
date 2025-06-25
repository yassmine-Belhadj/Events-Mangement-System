<?php

namespace App\Http\Controllers;


use App\Models\Location;
use App\Models\Organizer;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Organizer::query();
            return Datatables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "";

                    $btn .= '<a href="' . route("admin.organizers.edit", ["organizer" => $row->id]) . '"
                            class="btn btn-block btn-outline-primary"  data-position="top" data-tooltip="Editer">
                            <i class="material-icons">Modifier</i> </a>';
                    $btn .= '<a href="javascript:void(0)"  data-id="' . $row->id . '"
                        data-message="' . "Cliquez sur Oui pour supprimer organizer N° " . $row->id . '"
                        data-route="' . route("admin.organizers.destroy", ["organizer" => $row->id]) . '"
                            class="destroy btn btn-block btn-outline-danger tooltipped  "  data-position="top" data-tooltip="Supprimer">
                            <i class="material-icons">Supprimer</i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("administration.organizers");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("administration.organizers-create");

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
        try {
            $organizers = new organizer();
            $organizers->name = $request->name;

            $organizers->save();
            Alert::success('Succès', "Organizer crée avec succès");
        } catch (Exception $exception) {
            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }

        return redirect()->route("admin.organizers.index");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizer $organizer)
    {
        //


        return view("administration.organizers-edit", compact("organizer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, organizer $organizer): RedirectResponse
    {
        //
        $validation = self::validation($request);
        if ($validation != null) {
            Alert::error('Erreur', $validation);
            return redirect()->back();
        }
        try {
            $organizer->name = $request->name;
            $organizer->save();
            Alert::success('Succès', "organizer modifié avec succès");
        } catch (Exception $exception) {
            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(organizer $organizer)
    {
        //
        DB::beginTransaction();
        try {
            $organizer->delete();
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

    private function validation(Request $request)
    {
        $param = [
            'name' => 'required|string|max:255',
        ];
        $attributeNames = ['name' => 'Nom'];
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
