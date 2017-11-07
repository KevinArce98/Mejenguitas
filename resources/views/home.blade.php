@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <h3>Mejengas De la comunidad</h3>      
            <hr>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form action="#" method="POST" role="form" class="form-inline">
                <h5>Buscar mejenga</h5>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Filtar Nombres" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <p class="help-block">Seleccion una mejenga para ver más detalles</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Lugar</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matches as $match)

                            <tr id="{{ $match->id }}" href="{{ route('matchs.show', $match->id) }}">
                                <td>{{ $match->name }}</td>
                                <td>{{ $match->site }}</td>
                                <td>{{ $match->convertDateToNormal($match->date) }}</td>
                            </tr>
                         @empty
                        <tr>
                            <td colspan="3">No Hay Registros</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row text-center">
                {{ $matches->links() }}
            </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection