@extends("all.app")

@section("content")


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modifier domaine</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route("searchDomain.update",["searchDomain"=>$searchDomain])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nome de domaine</label>
                                            <input type="text" class="form-control" name="domain" value="{{$searchDomain->domain}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Modifier domaine</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

