<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Location;
use App\Models\Organizer;
use App\Models\Speaker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     * Display the Home Page
     */
    public function index()
    {
        $locations = Location::all();
        $categories = Category::all();
        $events = Event::query()->latest("date")->limit(10)->with("category")->get();
        $sponsors = Organizer::all();
        $speakers = Speaker::all();
        return view("home", compact("locations", "categories", "events", "sponsors","speakers"));
    }
}
