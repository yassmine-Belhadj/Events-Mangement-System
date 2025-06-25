<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,"index"])->name("home");
Route::get("/events",[EventController::class,"index"])->name("events.index");
Route::get("/events/{event}",[EventController::class,"show"])->name("events.show");
Route::get("aboutus",[AboutController::class,"index"])->name("about.index");
Route::get("contact",[ContactController::class,"index"])->name("contact.index");
Route::post("contacts",[ContactController::class,"store"])->name("contact.store");
Route::get("buy",[BuyController::class,"index"])->name("buy.index");







Route::prefix("admin")->middleware('auth')->group(function () {
    Route::get("users",[AdminController::class,"index"])->name("admin.users.index");

    /*
     *
     * events
     *
     * */
    Route::get("events",[EventController::class,"adminIndex"])->name("admin.events.index");
    Route::get("events/create",[EventController::class,"create"])->name("admin.events.create");
    Route::post("events",[EventController::class,"store"])->name("admin.events.store");
    Route::get("events/{event}/edit",[EventController::class,"edit"])->name("admin.events.edit");
    Route::put("events/{event}",[EventController::class,"update"])->name("admin.events.update");
    Route::delete("events/{event}",[EventController::class,"destroy"])->name("admin.events.destroy");
    /*
     * categories
     */
    Route::get("categories",[CategoryController::class,"index"])->name("admin.categories.index");
    Route::get("categories/create",[CategoryController::class,"create"])->name("admin.categories.create");
    Route::post("categories",[CategoryController::class,"store"])->name("admin.categories.store");
    Route::get("categories/{category}/edit",[CategoryController::class,"edit"])->name("admin.categories.edit");
    Route::put("categories/{category}",[CategoryController::class,"update"])->name("admin.categories.update");
    Route::delete("categories/{category}",[CategoryController::class,"destroy"])->name("admin.categories.destroy");

    /*
     *location
     */
    Route::get("locations",[LocationController::class,"index"])->name("admin.locations.index");
    Route::get("locations/create",[LocationController::class,"create"])->name("admin.locations.create");
    Route::post("locations",[LocationController::class,"store"])->name("admin.locations.store");
    Route::get("locations/{location}/edit",[LocationController::class,"edit"])->name("admin.locations.edit");
    Route::put("locations/{location}",[LocationController::class,"update"])->name("admin.locations.update");
    Route::delete("locations/{location}",[LocationController::class,"destroy"])->name("admin.locations.destroy");
     /*
      * speakers
      */
    Route::get("speakers",[SpeakerController::class,"index"])->name("admin.speakers.index");
    Route::get("speakers/create",[SpeakerController::class,"create"])->name("admin.speakers.create");
    Route::post("speakers",[SpeakerController::class,"store"])->name("admin.speakers.store");
    Route::get("speakers/{speaker}/edit",[SpeakerController::class,"edit"])->name("admin.speakers.edit");
    Route::put("speakers/{speaker}",[SpeakerController::class,"update"])->name("admin.speakers.update");
    Route::delete("speakers/{speaker}",[SpeakerController::class,"destroy"])->name("admin.speakers.destroy");

    /*
     * organizers
     */
    Route::get("organizers",[OrganizerController::class,"index"])->name("admin.organizers.index");
    Route::get("organizers/create",[OrganizerController::class,"create"])->name("admin.organizers.create");
    Route::post("organizers",[OrganizerController::class,"store"])->name("admin.organizers.store");
    Route::get("organizers/{organizer}/edit",[OrganizerController::class,"edit"])->name("admin.organizers.edit");
    Route::put("organizers/{organizer}",[OrganizerController::class,"update"])->name("admin.organizers.update");
    Route::delete("organizers/{organizer}",[OrganizerController::class,"destroy"])->name("admin.organizers.destroy");

});

require __DIR__.'/auth.php';
