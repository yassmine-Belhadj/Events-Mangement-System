@extends("administration.includes.main",["title" => "Gestion des Events"])
@section("content")
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier Speaker : {{$speaker->id}}</h5>
                <div class="offset-sm-10 col-sm-2 mb-5">
                    <a href="{{route("admin.speakers.index") }}"
                       class="btn btn-block btn-outline-primary" data-position="top"
                       data-tooltip="Acceuil">
                        <i class="material-icons">Retour</i> </a>
                </div>
                <form method="post" action="{{route("admin.speakers.update",["speaker"=>$speaker->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="card-text ">


                        <div class="form-group mt-5">
                            <label for="name">Nom de Speaker</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter le nom"
                                   value="{{$speaker->name}}">
                        </div>
                        <div class="form-group mt-5">
                            <label for="image">Image</label>
                            <input type="string" step="any" class="form-control" id="image" name="price" placeholder="Enter image"
                                   value="{{$speaker->image}}">
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

