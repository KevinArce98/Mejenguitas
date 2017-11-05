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
                        <tr>
                            <td colspan="3">No Hay Registros</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection
