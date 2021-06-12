@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Auth::user()->role == "teacher")
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addModel">Ajouter Domaine de recherche
                    </button>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List des doamines de rechere</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        nom de domaine
                                    </th>
                                    <th>
                                        Nombre des enseignant
                                    </th>
                                    <th>
                                        Nombre des projets
                                    </th>
                                    @if(Auth::user()->role == "teacher")
                                        <th>
                                            edit
                                        </th>
                                        <th>
                                            trash
                                        </th>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @foreach($search_domains as $search_domain)
                                        <tr>
                                            <td>
                                                {{$search_domain->id}}
                                            </td>
                                            <td>
                                                {{$search_domain->domain}}
                                            </td>
                                            <td>
                                                {{count($search_domain->teachers)}}
                                            </td>
                                            <td>
                                                {{count($search_domain->projects)}}
                                            </td>
                                            @if(Auth::user()->role == "teacher")
                                                <td class="text-primary">
                                                    <a type="button" rel="tooltip" title="Modifier"
                                                       href="{{route("searchDomain.edit",['searchDomain'=>$search_domain])}}"
                                                       class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                                <td class="text-primary">
                                                    <a href="{{route("searchDomain.delete",['searchDomain'=>$search_domain])}}"
                                                       rel="tooltip" title="Supprimer"
                                                       class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModel" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">Ajouter
                        domaine de recherche</h5>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group"
                          action="{{route('searchDomain')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nome de domaine</label>
                                    <input type="text" class="form-control" name="domain">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Ajouter domaine</button>
                        <div class="clearfix"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
