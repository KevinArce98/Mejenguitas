@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Principal</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estás en sesi&oacute;n!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <button type="button" class="btn btn-light"><strong>light</strong></button>
        <button type="button" class="btn btn-dark"><strong>dark</strong></button>
        <button type="button" class="btn btn-primary"><strong>primary</strong></button>
        <button type="button" class="btn btn-success"><strong>success</strong></button>
        <button type="button" class="btn btn-warning"><strong>warning</strong></button>
        <button type="button" class="btn btn-danger"><strong>danger</strong></button>



       <button type="button" class="btn btn-outline-primary"><strong>Primary</strong></button>
        <button type="button" class="btn btn-outline-secondary"><strong>Secondary</strong></button>
        <button type="button" class="btn btn-outline-success"><strong>Success</strong></button>
        <button type="button" class="btn btn-outline-danger"><strong>Danger</strong></button>
        <button type="button" class="btn btn-outline-warning"><strong>Warning</strong></button>
        <button type="button" class="btn btn-outline-info"><strong>Info</strong></button>
        <button type="button" class="btn btn-outline-light"><strong>Light</strong></button>
        <button type="button" class="btn btn-outline-dark"><strong>Dark</strong></button>


    </div>
</div>
@endsection
