@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modifier profil</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route("defence.update",["defence"=>$defence])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Etudiant 1</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="student1_id">
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}"
                                                            @if($defence->students[0]->id == $student->id)
                                                            selected
                                                        @endif>
                                                        {{$student->user->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Etudiant 2</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="student2_id">
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}"
                                                            @if($defence->students[1]->id == $student->id)
                                                            selected
                                                        @endif>
                                                        {{$student->user->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Encadrant</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="teacher_id">
                                                @foreach($teachers as $teacher)
                                                    <option
                                                        @if($teacher->id == $defence->teacher_id)
                                                        selected
                                                        @endif
                                                        value="{{$teacher->id}}">
                                                        {{$teacher->user->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input id="date" type="date" class="form-control" name="date" value="{{\Carbon\Carbon::parse($defence->date)->toDateString()}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Modifier soutenance</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

