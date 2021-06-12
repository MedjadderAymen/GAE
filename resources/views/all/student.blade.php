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
                            <form method="post" action="{{route("student.update",["student"=>$student])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nom et prénom</label>
                                            <input type="text" class="form-control" name="name" required value="{{$student->user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Adresse email</label>
                                            <input type="email" class="form-control" name="email" required value="{{$student->user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Changer mot de passe</label>
                                            <input type="password" class="form-control" name="password" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="birth_date"  required value="{{\Carbon\Carbon::parse($student->birth_date)->toDateString()}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Matricule</label>
                                            <input type="text" class="form-control" name="serial_number" required value="{{$student->serial_number}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Numero d'inscription </label>
                                            <input type="text" class="form-control" name="inscription_number" required value="{{$student->inscription_number}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" @if($department->id == $student->department_id) selected @endif>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Modifier Profil</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

