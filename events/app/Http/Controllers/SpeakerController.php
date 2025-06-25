<?php

namespace App\Http\Controllers;


use App\Models\Speaker;
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

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Speaker::query();
            return Datatables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "";

                    $btn .= '<a href="' . route("admin.speakers.edit", ["speaker" => $row->id]) . '"
                            class="btn btn-block btn-outline-primary"  data-position="top" data-tooltip="Editer">
                            <i class="material-icons">Modifier</i> </a>';
                    $btn .= '<a href="javascript:void(0)"  data-id="' . $row->id . '"
                        data-message="' . "Cliquez sur Oui pour supprimer le Speaker N° " . $row->id . '"
                        data-route="' . route("admin.speakers.destroy", ["speaker" => $row->id]) . '"
                            class="destroy btn btn-block btn-outline-danger tooltipped  "  data-position="top" data-tooltip="Supprimer">
                            <i class="material-icons">Supprimer</i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("administration.speakers");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("administration.speeakers-create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        //dd($request);
        try {
            $speaker = new Speaker();
            $speaker->name = $request->name;
            $speaker->image = "image test";
            $speaker->job = "test job";

            $speaker->save();
            Alert::success('Succès', "speaker crée avec succès");
        } catch (Exception $exception) {

            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }

        return redirect()->route("admin.speakers.index");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speaker $speaker)
    {
        //


        return view("administration.speakers-edit", compact("speaker"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speaker $speaker): RedirectResponse
    {
        //
        try {
            $speaker->name = $request->name;
            $speaker->save();
            Alert::success('Succès', "Speaker crée avec succès");
        } catch (Exception $exception) {
            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        //

        DB::beginTransaction();
        try {
            $speaker->delete();
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
            'speaker' => 'required|string|max:255',
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
