@extends("administration.includes.main",["title" => "Gestion des Events"])
@section("content")
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier l'évènement : {{$event->id}}</h5>
                <div class="offset-sm-10 col-sm-2 mb-5">
                    <a href="{{route("admin.events.index") }}"
                       class="btn btn-block btn-outline-primary" data-position="top"
                       data-tooltip="Acceuil">
                        <i class="material-icons">Retour</i> </a>
                </div>
                <form method="post" action="{{route("admin.events.update",["event"=>$event->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="card-text ">


                        <div class="form-group mt-5">
                            <label for="name">Nom de l'évènement</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter le nom"
                                   value="{{$event->name}}">
                        </div>
                        <div class="form-group">


                            <label>Location</label>
                            <select name="location" class="form-control select2" style="width: 100%;">
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}"
                                            @if($location->id == $event->location_id) selected="selected" @endif >{{$location->name}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label>Categories</label>
                            <select name="category" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($category->id == $event->category_id) selected="selected" @endif >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Organizers</label>
                            <select name="organizer" class="form-control select2" style="width: 100%;">
                                @foreach($organizers as $organizer)
                                    <option value="{{$organizer->id}}"
                                            @if($organizer->id == $event->organizer_id) selected="selected" @endif >{{$organizer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Speakers</label>
                            <select name="speaker" class="form-control select2" style="width: 100%;">
                                @foreach($speakers as $speaker)
                                    <option value="{{$speaker->id}}"
                                            @if($speaker->id == $event->speaker_id) selected="selected" @endif >{{$speaker->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Organizers</label>
                            <select name="organizer" class="form-control select2" style="width: 100%;">
                                @foreach($organizers  as $organizer)
                                    <option value="{{$organizer->id}}"
                                            @if($organizer->id == $event->organizer_id) selected="selected" @endif >{{$organizer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label for="image">Image</label>
                            <input type="string" step="any" class="form-control" id="image" name="price" placeholder="Enter image"
                                   value="{{$event->image}}">
                        </div>

                        <div class="form-group mt-5">
                            <label for="price">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Enter le prix"
                                   value="{{$event->price}}">
                        </div>
                        <div class="form-group mt-5">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter la date"
                                   value="{{$event->date}}">
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </form>

            </div>
        </div>


    </div>

@endsection

