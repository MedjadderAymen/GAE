@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addModel">Ajouter Soutenance
                    </button>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List des Soutenances</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Encadrant
                                    </th>
                                    <th>
                                        Etudiant 1
                                    </th>
                                    <th>
                                        Etudiant 2
                                    </th>
                                    <th>
                                        affectation
                                    </th>
                                    <th>
                                        président
                                    </th>
                                    <th>
                                        examinateur
                                    </th>
                                    <th>
                                        edit
                                    </th>
                                    <th>
                                        trash
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($defences as  $defence)
                                        <tr>
                                            <td>
                                                {{$defence->id}}
                                            </td>
                                            <td>
                                                {{$defence->teacher->user->name}}
                                            </td>
                                            <td>
                                                {{$defence->students[0]->user->name}}
                                            </td>
                                            <td>
                                                {{$defence->students[1]->user->name}}
                                            </td>
                                            <td class="text-primary">
                                                <a type="button" rel="tooltip" title="Affectation"
                                                   href="{{route("affectation",['defence'=>$defence])}}"
                                                   class="btn btn-primary btn-link btn-sm">
                                                    @if(!$defence->affectation)
                                                        <i class="material-icons">add</i> Affecter jury
                                                    @else
                                                        <i class="material-icons">edit</i> Modifier jury
                                                    @endif

                                                </a>
                                            </td>
                                            @if($defence->affectation)
                                                @foreach($defence->affectation->teachers as $teacher)
                                                    <td>
                                                        {{$teacher->user->name}}
                                                    </td>
                                                @endforeach
                                            @else
                                                <td>
                                                    -
                                                </td>
                                                <td>
                                                    -
                                                </td>
                                            @endif
                                            <td class="text-primary">
                                                <a type="button" rel="tooltip" title="Modifier"
                                                   href="{{route("defence.edit",['defence'=>$defence])}}"
                                                   class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{route("defence.delete",['defence'=>$defence])}}"
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
                        Soutenance</h5>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group"
                          action="{{route('defence')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Etudiant 1</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="student1_id">
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Etudiant 2</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="student2_id">
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Encadrant</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="teacher_id">
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input id="date" type="date" class="form-control" name="date">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Ajouter Soutenance</button>
                        <div class="clearfix"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
²
