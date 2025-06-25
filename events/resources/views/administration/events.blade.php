@extends("administration.includes.main",["title" => "Gestion des Events"])
@section("content")
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des évènements</h5>

                <div class="card-text mt-3">
                    <div class="offset-sm-10 col-sm-2 mb-5">  <a href="{{route("admin.events.create") }}"
                       class="btn btn-block btn-outline-success"  data-position="top" data-tooltip="Editer">
                            <i class="material-icons">Ajouter</i> </a></div>
                    <table class="table table-bordered table-hover" id="events_table" style="width: 100%">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Date</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Location</th>
                            <th>Speaker</th>
                            <th>Organizer</th>
                            <th>Créé le</th>
                            <th>Mis à jour le</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Date</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Location</th>
                            <th>Speaker</th>
                            <th>Organizer</th>
                            <th>Créé le</th>
                            <th>Mis à jour le</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>


    </div>
    <div class="offset-sm-10 col-sm-2 mb-5">  <a href="{{route("home") }}"
                                                 class="btn btn-block btn-outline-success"  data-position="top" data-tooltip="Editer">
            <i class="material-icons">Retour</i> </a></div>

@endsection
@section("js")

    <script>
        var table_events;

        $(document).ready(function () {

            table_events = $('#events_table').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
                },
                processing: true,
                serverSide: true,
                scrollX: true,
                order: [[0, 'desc']],
                ajax: "{{ route("admin.events.index") }}",
                columns:[
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'date', name: 'date'},
                    {data: 'price', name: 'price'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'location.name', name: 'location.name'},
                    {data: 'speaker.name', name: 'speaker.name'},
                    {data: 'organizer.name', name: 'organizer.name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
        $('body').on('click', '.destroy', function () {

            var message = $(this).data("message");
            var route = $(this).data("route")
            Swal.fire({
                title: "Êtes-vous sûr de supprimer ?",
                text: message ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, Confirmer !',
                cancelButtonText: 'Annuler',
                customClass: {
                    confirmButton: 'btn btn-danger me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-outline-primary waves-effect'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({

                        type: 'DELETE',
                        data: {
                            _token: "{{csrf_token()}}" // Token CSRF pour la sécurité
                        },
                        url: route,
                        success: function (data) {
                            if (!data.error) {
                                Swal.fire({
                                    title: 'Succès',
                                    text: "Opération effectuée avec succès",
                                    icon: 'success',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success waves-effect'
                                    }
                                });
                                table_events.ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'Erreur',
                                    text: data.message,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary waves-effect'
                                    }
                                });
                            }
                        },
                        error: function (data) {
                            Swal.fire({
                                title: 'Erreur',
                                text: "Une Erreur est survenue",
                                icon: 'error',
                                customClass: {
                                    confirmButton: 'btn btn-primary waves-effect'
                                }
                            });
                        }
                    });
                }
            });
        })
    </script>
@endsection
