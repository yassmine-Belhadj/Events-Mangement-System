@extends("administration.includes.main",["title" => "Gestion des Categories "])
@section("content")
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier la category : {{$category->id}}</h5>
                <div class="offset-sm-10 col-sm-2 mb-5">
                    <a href="{{route("admin.categories.index") }}"
                       class="btn btn-block btn-outline-primary" data-position="top"
                       data-tooltip="Acceuil">
                        <i class="material-icons">Retour</i> </a>
                </div>
                <form method="post" action="{{route("admin.categories.update",["category"=>$category->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="card-text ">


                        <div class="form-group mt-5">
                            <label for="name">Nom de la categorie</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter le nom"
                                   value="{{$category->name}}">
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

