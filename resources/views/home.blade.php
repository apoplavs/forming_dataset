@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Привіт {{Auth::user()->name}}, вибери категорію</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form class="form-horizontal" method="GET" action="{{ route('choose-category') }}">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="civil" value="civil" required checked>
                                    <label class="form-check-label" for="civil">
                                        Цивільне судочинство
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="criminal" value="criminal" required>
                                    <label class="form-check-label" for="criminal">
                                        Кримінальне судочинство
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="commercial" value="commercial" disabled>
                                    <label class="form-check-label" for="commercial">
                                        Господарське судочинство
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="admin" value="admin" disabled>
                                    <label class="form-check-label" for="admin">
                                        Адміністративне судочинство
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="adminoffense" value="adminoffense" required>
                                    <label class="form-check-label" for="adminoffense">
                                        Судочинство в порядку КУпАП
                                    </label>
                                </div>

                                <hr>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type-documents" id="stage-proceeding" value="1" required checked>
                                    <label class="form-check-label" for="stage-proceeding">
                                        &nbsp; Своєчасність
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type-documents" id="types-decision" value="2" required>
                                    <label class="form-check-label" for="types-decision">
                                        &nbsp; Типи кінцевих рішень
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type-documents" id="appeal-secision" value="3" required>
                                    <label class="form-check-label" for="appeal-secision">
                                        &nbsp;  Компетентність 1 (апеляція)
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Почати
                                        </button>
                                    </div>
                                </div>
                        </form>
                        @if(Auth::user()->name == "admin")
                        <a href="{{ route('get-dataset') }}?token={{ Hash::make('toe-cyd') }}" style="float: right">
                            <button class="btn btn-primary">скачати датасет</button>
                        </a>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
