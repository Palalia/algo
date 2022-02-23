@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">USUARIOS</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                             {{-- <h3 class="text-center">Dashboard Content</h3> --}}

                            <A class="btn btn-warning" href="{{ route('usuarios.create') }}">NUEVO </a>

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #005388; ">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">NOMBRE</th>
                                    <th style="color: #fff;">E-MAIL</th>
                                    <th style="color: #fff;">ROL</th>
                                    <th style="color: #fff;">ACCIONES</th>
                                </thead>

                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td style="display: none;">{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>

                                            {{-- boton para editar --}}
                                            <td>
                                                <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id)}}">EDITAR</a>

                                            {{-- boton eliminar --}}
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                            {{-- Paginacion --}}
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

