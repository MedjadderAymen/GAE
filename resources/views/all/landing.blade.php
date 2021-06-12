@extends("all.app")

@section("content")

    @if(Auth::user()->role == "student")
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                            </div>
                            <div class="m-3">
                                <p>Nom & Prénom: <strong>{{Auth::user()->name}}</strong></p>
                                <p>Date de naissance: <strong>{{Auth::user()->student->birth_date}}</strong></p>
                                <p>Matricule : <strong>{{Auth::user()->student->serial_number}}</strong></p>
                                <p>Numéro d'inscription: <strong>{{Auth::user()->student->inscription_number}}</strong>
                                </p>
                                <p>Email: <strong>{{Auth::user()->email}}</strong></p>
                                <p>Département: <strong>{{Auth::user()->student->department->name}}</strong></p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    information personelle
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_paste</i>
                                </div>
                            </div>
                            <div class="m-3">
                                @if(Auth::user()->student->defence)
                                    <p>Nom & Prénom d'encadrant:
                                        <strong>{{Auth::user()->student->defence->teacher->user->name}}</strong></p>
                                    <p>Nom & Prénom du binome: <strong>
                                            @foreach(Auth::user()->student->defence->students as $student)
                                                @if($student->id != Auth::user()->student->id)
                                                    {{$student->user->name}}
                                                @endif
                                            @endforeach</strong></p>
                                    <p>Date: <strong>{{Auth::user()->student->defence->date}}</strong></p>
                                @else
                                    <p>pas encore</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    information soutenance
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_paste</i>
                                </div>
                            </div>
                            <div class="m-3">
                                @if(Auth::user()->student->defence)
                                    @if(Auth::user()->student->defence->affectation)
                                        <p>Nom & Prénom Du président:
                                            <strong>{{Auth::user()->student->defence->affectation->teachers[0]->user->name}}</strong>
                                        </p>
                                        <p>Nom & Prénom Du examinateur:
                                            <strong>{{Auth::user()->student->defence->affectation->teachers[1]->user->name}}</strong>
                                        </p>
                                    @else
                                        <p>
                                            pas encore
                                        </p>
                                    @endif
                                @else
                                    <p>pas encore</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    information jury
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if(Auth::user()->role == "teacher")
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">person</i>
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p>Nom & Prénom: <strong>{{Auth::user()->name}}</strong></p>
                                    <p>grade: <strong>{{Auth::user()->teacher->grade}}</strong></p>
                                    <p>Email: <strong>{{Auth::user()->email}}</strong></p>
                                    <p>Département: <strong>{{Auth::user()->teacher->department->name}}</strong></p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        information personelle
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_paste</i>
                                    </div>
                                </div>
                                <div class="m-3">
                                    @if(Auth::user()->teacher->defence)
                                        <p>Nom & Prénom etudiant
                                            1:<strong>{{Auth::user()->teacher->defence->students[0]->user->name}}</strong>
                                        </p>
                                        <p>Nom & Prénom etudiant
                                            1:<strong>{{Auth::user()->teacher->defence->students[1]->user->name}}</strong>
                                        </p>
                                        <p>Date: <strong>{{Auth::user()->teacher->defence->date}}</strong></p>
                                    @else
                                        <p>pas encore</p>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        information soutenance
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_paste</i>
                                    </div>
                                </div>
                                <div class="m-3">
                                    @if(Auth::user()->teacher->defence)
                                        @if(Auth::user()->teacher->defence->affectation)
                                            <p>Nom & Prénom Du président:
                                                <strong>{{Auth::user()->teacher->defence->affectation->teachers[0]->user->name}}</strong>
                                            </p>
                                            <p>Nom & Prénom Du examinateur:
                                                <strong>{{Auth::user()->teacher->defence->affectation->teachers[1]->user->name}}</strong>
                                            </p>
                                        @else
                                            <p>
                                                pas encore
                                            </p>
                                        @endif
                                    @else
                                        <p>pas encore</p>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        information jury
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_paste</i>
                                    </div>
                                </div>
                                <div class="m-3">
                                    @if(Auth::user()->teacher->affectation)
                                        Vous est dans la jury de la soutenance du binome <strong>{{Auth::user()->teacher->affectation->defence->students[0]->user->name}}</strong> et <strong>{{Auth::user()->teacher->affectation->defence->students[1]->user->name}}</strong>
                                        sous l'ncadremant de <strong>{{Auth::user()->teacher->affectation->defence->teacher->user->name}}</strong>, le <strong>{{Auth::user()->teacher->affectation->defence->date}}</strong>
                                    @else
                                        <p>pas encore</p>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        information affectation
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else

        @endif
    @endif

@endsection
