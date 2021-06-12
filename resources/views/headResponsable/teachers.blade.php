@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addModel">Ajouter Enseignant
                    </button>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List des enseignants</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nom et prénom
                                    </th>
                                    <th>
                                        Mail
                                    </th>
                                    <th>
                                        Grade
                                    </th>
                                    <th>
                                        Département
                                    </th>
                                    <th>
                                        edit
                                    </th>
                                    <th>
                                        trash
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as  $teacher)
                                        <tr>
                                            <td>
                                                {{$teacher->id}}
                                            </td>
                                            <td>
                                                {{$teacher->user->name}}
                                            </td>
                                            <td>
                                                {{$teacher->user->email}}
                                            </td>
                                            <td>
                                                {{$teacher->grade}}
                                            </td>
                                            <td>
                                                {{$teacher->department->name}}
                                            </td>
                                            <td class="text-primary">
                                                <a type="button" rel="tooltip" title="Modifier"
                                                   href="{{route("teacher.edit",['teacher'=>$teacher])}}"
                                                   class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route("teacher.delete",['teacher'=>$teacher])}}"
                                                   rel="tooltip" title="Supprimer"
                                                   class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
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
                        enseignant</h5>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group"
                          action="{{route('teacher')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nom et prénom</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Adresse email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mot de passe</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Grade</label>
                                    <input type="text" class="form-control" name="grade">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Département</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($search_domains as $search)

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="{{$search->id}}" name="search_domains[]">
                                    {{$search->domain}}
                                    <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                </label>
                            </div>

                        @endforeach
                        <button type="submit" class="btn btn-primary pull-right">Ajouter enseignant</button>
                        <div class="clearfix"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
