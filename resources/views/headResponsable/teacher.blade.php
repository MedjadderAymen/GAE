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
                            <form method="post" action="{{route("teacher.update",["teacher"=>$teacher])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nom et prénom</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{$teacher->user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Adresse email</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{$teacher->user->email}}">
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
                                            <input type="text" class="form-control" name="grade"
                                                   value="{{$teacher->grade}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Département</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"
                                                    @if($department->id == $teacher->department_id) selected @endif>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($search_domains as $search)

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   value="{{$search->id}}"
                                                   @foreach($teacher->searchDomains as $searchDomain)
                                                       @if($searchDomain->id == $search->id)
                                                       checked
                                                       @endif
                                                   @endforeach
                                                   name="search_domains[]">
                                            {{$search->domain}}
                                            <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                        </label>
                                    </div>

                                @endforeach
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

