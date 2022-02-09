@extends('layouts.app')
@section('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row">
                <div class="col-md-6 ">
                    <h6 class="m-0 font-weight-bold text-primary mt-2">Administración de laboratoristas</h6>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-outline-primary text-right" onclick="guardar()">
                        <i class="fas fa-plus-circle"></i> Nuevo ff
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Perfil</th>
                            <th>Laboratorio</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Estado</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($labs as $item)
                            <tr>
                                <td>{{ $item->cedula }}</td>
                                <td>{{ $item->apellido }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->rol }}</td>
                                <td>{{ $item->laboratorio }}</td>
                                <td>{{ $item->direccion }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->estado }}</td>


                                <td>
                                    <div class="text-center">
                                      {{--   <button type="button" class="btn btn-outline-warning"
                                            onclick='editar("#editarModal{{$item->id}}","{{ $item->cedula }}","{{ $item->apellido }}","{{ $item->nombre }}","{{ $item->rol }}","{{ $item->laboratorio }}","{{ $item->provincia }}","{{ $item->canton }}","{{ $item->estado }}","{{ $item->direccion }}","{{ $item->email }}")'><i
                                                class="fas fa-edit"></i></button> --}}
                                        <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                            data-target="#editarModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick='eliminar("{{ $item->cedula }}")'><i
                                                class="fas fa-trash"></i></button>
                                    </div>

                                    <!-- Editar-->
                                    <div class="modal fade" id="editarModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><label id="tituloModal"></label></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="editarForm" class="user" method="POST"
                                                        action="{{ route('laboratoristas.update', $item->id) }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <!-- Input Cédula -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="cedula">Cédula</label>
                                                                <input type="text" class="form-control" id="cedula"
                                                                    name="cedula" value="{{ $item->cedula }}">
                                                            </div>



                                                            <!--Input Apellido -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="apellido">Apellido</label>
                                                                <input type="text" class="form-control" id="apellido"
                                                                    name="apellido" value="{{ $item->apellido }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <!-- Input Nombre -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="nombre">Nombre</label>
                                                                <input type="text" class="form-control" id="nombre"
                                                                    name="nombre" value="{{ $item->nombre }}">
                                                            </div>
                                                            <!--Select Perfil -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="perfil">Perfil</label>
                                                                <select
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    id="rol"
                                                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px"
                                                                    name="rol">
                                                                    <option>--Seleccione--</option>
                                                                    <option value="Administrador" {!! $item->rol === 'Administrador' ? 'selected' : '' !!}>
                                                                        Administrador</option>
                                                                    <option value="Laboratorio" {!! $item->rol === 'Laboratorista' ? 'selected' : '' !!}>
                                                                        Laboratorista</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <!-- Select Laboratorio -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="laboratorio">Laboratorio</label>
                                                                <select
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    id="laboratorio"
                                                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px"
                                                                    name="laboratorio">
                                                                    <option>--Seleccione--</option>
                                                                    <option value="LAB-ADMIN" {!! $item->laboratorio === 'LAB-ADMIN' ? 'selected' : '' !!}>LAB-ADMIN</option>
                                                                    <option value="LAB-01" {!! $item->laboratorio === 'LAB-01' ? 'selected' : '' !!}>LAB-01
                                                                    </option>
                                                                    <option value="LAB-02" {!! $item->laboratorio === 'LAB-02' ? 'selected' : '' !!}>LAB-02
                                                                    </option>
                                                                    <option value="LAB-03" {!! $item->laboratorio === 'LAB-03' ? 'selected' : '' !!}>LAB-03
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <!--Select Estado -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="estado">Estado</label>
                                                                <select
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    id="estado"
                                                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px"
                                                                    name="estado">
                                                                    <option>--Seleccione--</option>
                                                                    <option value="Activo" {!! $item->estado === 'Activo' ? 'selected' : '' !!}>Activo
                                                                    </option>
                                                                    <option value="Inactivo" {!! $item->estado === 'Inactivo' ? 'selected' : '' !!}>
                                                                        Inactivo</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <!-- Select Laboratorio -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="provincia">Provincia</label>
                                                                <select
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    id="provincia" name="provincia"
                                                                    value="{{ $item->provincia }}"
                                                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                                                                    <option>--Seleccione--</option>
                                                                    <option value="Chimborazo" {!! $item->provincia === 'Chimborazo' ? 'selected' : '' !!}>
                                                                        Chimborazo</option>
                                                                    <option value="Pichincha" {!! $item->provincia === 'Pichincha' ? 'selected' : '' !!}>
                                                                        Pichincha</option>
                                                                    <option value="Santa Elena" {!! $item->provincia === 'Santa Elena' ? 'selected' : '' !!}>
                                                                        Santa Elena</option>
                                                                    <option value="Tungurahua" {!! $item->provincia === 'Tungurahua' ? 'selected' : '' !!}>
                                                                        Tungurahua</option>
                                                                </select>
                                                            </div>
                                                            <!--Select Estado -->
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="canton">Cantón</label>
                                                                <select
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    id="canton" name="canton" {{ $item->canton }}
                                                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                                                                    <option>--Seleccione--</option>
                                                                    <option value="Ambato" {!! $item->canton === 'Ambato' ? 'selected' : '' !!}>Ambato
                                                                    </option>
                                                                    <option value="Quito" {!! $item->canton === 'Quito' ? 'selected' : '' !!}>Quito
                                                                    </option>
                                                                    <option value="Riobamba" {!! $item->canton === 'Riobamba' ? 'selected' : '' !!}>
                                                                        Riobamba</option>
                                                                    <option value="Salinas" {!! $item->canton === 'Salinas' ? 'selected' : '' !!}>Salinas
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Input Dirección -->
                                                        <div class="form-group">
                                                            <label for="direccion">Dirección</label>
                                                            <input type="text" class="form-control" id="direccion"
                                                                name="direccion" value="{{ $item->direccion }}">
                                                        </div>
                                                        <!-- Input Correo Electrónico -->
                                                        <div class="form-group">
                                                            <label for="email">Correo Electrónico</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ $item->email }}">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Guardar-->
    <div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><label id="tituloModal"></label></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('laboratoristas.store') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- Input Cédula -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula"
                                    value="{{ old('cedula') }}">
                            </div>
                            <!--Input Apellido -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Input Nombre -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ old('nombre') }}">
                            </div>
                            <!--Select Perfil -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="perfil">Perfil</label>
                                <select class="custom-select custom-select-sm form-control form-control-sm" id="rol"
                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px" name="rol"
                                    value="{{ old('rol') }}">
                                    <option>--Seleccione--</option>
                                    <option>Administrador</option>
                                    <option>Laboratorista</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Select Laboratorio -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="laboratorio">Laboratorio</label>
                                <select class="custom-select custom-select-sm form-control form-control-sm" id="laboratorio"
                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px" name="laboratorio"
                                    value="{{ old('laboratorio') }}">
                                    <option>--Seleccione--</option>
                                    <option>LAB-ADMIN</option>
                                    <option>LAB-01</option>
                                    <option>LAB-02</option>
                                    <option>LAB-03</option>
                                </select>
                            </div>
                            <!--Select Estado -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="estado">Estado</label>
                                <select class="custom-select custom-select-sm form-control form-control-sm" id="estado"
                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px" name="estado"
                                    value="{{ old('estado') }}">
                                    <option>--Seleccione--</option>
                                    <option>Activo</option>
                                    <option>Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <!-- Select Laboratorio -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="provincia">Provincia</label>
                                <select class="custom-select custom-select-sm form-control form-control-sm" id="provincia"
                                    name="provincia" value="{{ old('provincia') }}"
                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                                    <option>--Seleccione--</option>
                                    <option>Chimborazo</option>
                                    <option>Pichincha</option>
                                    <option>Santa Elena</option>
                                    <option>Tungurahua</option>
                                </select>
                            </div>
                            <!--Select Estado -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="canton">Cantón</label>
                                <select class="custom-select custom-select-sm form-control form-control-sm" id="canton"
                                    name="canton" value="{{ old('canton') }}"
                                    style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                                    <option>--Seleccione--</option>
                                    <option>Ambato</option>
                                    <option>Quito</option>
                                    <option>Riobamba</option>
                                    <option>Salinas</option>
                                </select>
                            </div>
                        </div>
                        <!-- Input Dirección -->
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                value="{{ old('direccion') }}">
                        </div>
                        <!-- Input Correo Electrónico -->
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group row" id="divContraseña">
                            <!-- Input Contraseña -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    autocomplete="new-password">
                            </div>
                            <!-- Input Confirmar Contraseña -->
                            <div class="col-sm-6">
                                <label for="password-confirm">Confirmar contraseña</label>
                                <input type="password" class="form-control" id="password-confirm" password_confirmation
                                    required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Eliminar-->
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar laboratorista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h1 class="text-danger">¿Está seguro que desea eliminar?</h1>
                    <h2>Laboratorista: <strong id="laboratorista"></strong></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function guardar() {
            $('#nuevoModal').modal({
                show: true
            });
            $('#tituloModal').text('Nuevo laboratorista');
            $('#cedula').val("");
            $('#apellido').val("");
            $('#nombre').val("");
            $('#perfil').val("");
            $('#laboratorio').val("");
            $('#estado').val("");
            $('#direccion').val("");
            $('#email').val("");
            $('#divContraseña').show();
        }

        function editar(id, cedula, apellido, nombre, rol, laboratorio, provincia, canton, estado, direccion, email) {

            $(id).modal({
                show: true
            });
            $('#tituloModal').text('Editar laboratorista');
            $('#cedula').val(cedula);
            $('#apellido').val(apellido);
            $('#nombre').val(nombre);
            $('#rol').val(rol);
            $('#laboratorio').val(laboratorio);
            $('#provincia').val(provincia);
            $('#canton').val(canton);
            $('#estado').val(estado);
            $('#direccion').val(direccion);
            $('#email').val(email);

        }

        function eliminar(cedula) {
            $('#eliminarModal').modal({
                show: true
            });
            $('#laboratorista').text(cedula);
        }
    </script>
@endsection
@section('scripts')

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
