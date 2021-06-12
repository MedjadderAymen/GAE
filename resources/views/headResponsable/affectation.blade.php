@extends("all.app")

@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Affectaion</h4>
                        </div>
                        @if($defence->affectation)
                            <div class="card-body">
                                <form method="post" action="{{route("affectation.update",["defence"=>$defence])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">étudiant 1</label>
                                                <p>{{$defence->students[0]->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">étudiant 2</label>
                                                <p>{{$defence->students[1]->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">encadrant </label>
                                                <p>{{$defence->teacher->user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Date</label>
                                                <p>{{$defence->date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="pr">modifier Président</label>
                                                <select class="form-control" id="pr" name="president_id">
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}"
                                                            @if($teacher->id == $defence->affectation->teachers[0]->id)
                                                                selected
                                                            @endif>
                                                            {{$teacher->user->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="ex">modifier Examinateur</label>
                                                <select class="form-control" id="ex" name="examiner_id">
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}"
                                                                @if($teacher->id == $defence->affectation->teachers[1]->id)
                                                                selected
                                                            @endif>
                                                            {{$teacher->user->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Modifier affectation
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                                <a  href="{{route("affectation.delete",['defence'=>$defence])}}" class="btn btn-danger pull-right">Supprimer affectation
                                </a>
                            </div>
                        @else
                            <div class="card-body">
                                <form method="post" action="{{route("affectation",["defence"=>$defence])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">étudiant 1</label>
                                                <p>{{$defence->students[0]->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">étudiant 2</label>
                                                <p>{{$defence->students[1]->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">encadrant </label>
                                                <p>{{$defence->teacher->user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Date</label>
                                                <p>{{$defence->date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="pr">Séléctionner
                                                    Président</label>
                                                <select class="form-control" id="pr" name="president_id">
                                                    @foreach($teachers as $teacher)
                                                        <option
                                                            value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating" for="ex">Séléctionner
                                                    Examinateur</label>
                                                <select class="form-control" id="ex" name="examiner_id">
                                                    @foreach($teachers as $teacher)
                                                        <option
                                                            value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Confirmer affectation
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

