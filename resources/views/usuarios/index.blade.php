@extends('layouts.app')
@section('title', 'Gestion de Usuarios')

@section('content')
@include('partials.messages')
<div class="col-12 mb-30">
    <div class="box">
        <a href="{{route('usuarios.create')}}" class="button button-success button-sm">Registar Usuario</a>
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Lista de Usuarios</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered data-table data-table-default">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $key =>$user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->apellido}}</td>
                                <td>{{$user->email}}</td>
                                
                               
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>


        <script>
            function Editar(id, nombre) {
                document.getElementById('id1').value=id;
                document.getElementById('nombre1').value=nombre;
            }
        </script>
        @endsection
