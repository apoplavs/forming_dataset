@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span id="doc-id"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Про що свідчить даний документ
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div id="doc-text" style="font-family: 'Times New Roman', Times, serif; color: black;">
                        </div>
                        <hr>
                        <div id="bottom-of-page"></div>
                        <div id="group-buttons" align="center">
                            <div id="choose-buttons" class="btn-group" role="group"></div>
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            <br>
                            <div class="btn-group btn-group-sm" role="group">
                                <button id="previous-doc" class="btn btn-info" onclick="previousDoc();">&lt; попередній документ</button>
                                <button class="btn btn-warning" onclick="stopFormDataset();">завершити</button>
                                <button id="next-doc" class="btn btn-info" onclick="nextDoc();">жоден із варіантів &gt;</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var documents = {!! $doc_set !!};
    var buttons = {!! $buttons !!};
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="{{ asset('js/make_dataset.js') }}"></script>
@endsection
