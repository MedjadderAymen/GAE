@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addModel">Ajouter Etudiats
                    </button>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List des étudiants</h4>
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
                                        Date de naissance
                                    </th>
                                    <th>
                                        Matricule
                                    </th>
                                    <th>
                                        Numéro d'inscription
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
                                    @foreach($students as  $student)
                                        <tr>
                                            <td>
                                                {{$student->id}}
                                            </td>
                                            <td>
                                                {{$student->user->name}}
                                            </td>
                                            <td>
                                                {{$student->user->email}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($student->birth_date)->toDateString()}}
                                            </td>
                                            <td>
                                                {{$student->serial_number}}
                                            </td>
                                            <td>
                                                {{$student->inscription_number}}
                                            </td>
                                            <td>
                                                {{$student->department->name}}
                                            </td>
                                            <td class="text-primary">
                                                <a type="button" rel="tooltip" title="Modifier" href="{{route("student.edit",['student'=>$student])}}"
                                                   class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route("student.delete",['student'=>$student])}}"
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
                        etudient</h5>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group"
                          action="{{route('student')}}"
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
                                    <input type="date" class="form-control" name="birth_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Matricule</label>
                                    <input type="text" class="form-control" name="serial_number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Numero d'inscription </label>
                                    <input type="text" class="form-control" name="inscription_number">
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
                        <button type="submit" class="btn btn-primary pull-right">Ajouter étudiant</button>
                        <div class="clearfix"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
