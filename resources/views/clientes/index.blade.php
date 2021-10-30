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
                <h6 class="m-0 font-weight-bold text-primary mt-2">Administración de clientes</h6>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-outline-primary text-right" onclick="guardar()">
                    <i class="fas fa-plus-circle"></i> Nuevo
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
                        <th>Dirección</th>
                        <th>Provincia</th>
                        <th>Cantón</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 50; $i++)
                        <tr>
                            <td>{{ $cedula = 11110 + $i }}</td>
                            <td>{{ $apellido = "Tiger $i" }}</td>
                            <td>{{ $nombre = "Nixon $i" }}</td>
                            <td>{{ $direccion = "Edinburgh $i" }}</td>
                            @if ($i % 2 == 0)
                                <td>{{ $provincia = "Tungurahua" }}</td>
                            @elseif ($i % 5 == 0)
                                <td>{{ $provincia = "Pichincha" }}</td>
                            @elseif ($i % 3 == 0)
                                <td>{{ $provincia = "Chimborazo" }}</td>
                            @else
                            <td>{{ $provincia = "Santa Elena" }}</td>
                            @endif
                            @if ($i % 2 == 0)
                                <td>{{ $canton = "Ambato" }}</td>
                            @elseif ($i % 5 == 0)
                                <td>{{ $canton = "Quito" }}</td>
                            @elseif ($i % 3 == 0)
                                <td>{{ $canton = "Riobamba" }}</td>
                            @else
                            <td>{{ $canton = "Salinas" }}</td>
                            @endif
                            <td>{{ $email = "tiger$i@gmail.com" }}</td>
                            @if ($i % 2 == 0)
                                <td>{{ $estado = "Activo" }}</td>
                            @else
                                <td>{{ $estado = "Inactivo" }}</td>
                            @endif
                            <td>
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#nuevoModal"
                                    onclick='editar("{{$cedula}}","{{$apellido}}","{{$nombre}}","{{$estado}}","{{$direccion}}","{{$provincia}}","{{$canton}}","{{$email}}")'><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger"
                                    onclick='eliminar("{{$cedula}}")'
                                    ><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Guardar/Editar-->
<div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><label id="tituloModal"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="user" action="{{ route('index') }}">
                @csrf
                <div class="form-group row">
                    <!-- Input Cédula -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula">
                    </div>
                    <!--Input Apellido -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- Input Nombre -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <!--Input Estado -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="apellido">Estado</label>
                        <select class="custom-select custom-select-sm form-control form-control-sm" id="estado" style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                            <option>--Seleccione--</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                </div>
                <!-- Input Dirección -->
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion">
                </div>
                <div class="form-group row">
                    <!-- Select Laboratorio -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="provincia">Provincia</label>
                        <select class="custom-select custom-select-sm form-control form-control-sm" id="provincia" style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
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
                        <select class="custom-select custom-select-sm form-control form-control-sm" id="canton" style="font-size: 1rem; padding-left: 0.8rem; height: 39px">
                            <option>--Seleccione--</option>
                            <option>Ambato</option>
                            <option>Quito</option>
                            <option>Riobamba</option>
                            <option>Salinas</option>
                        </select>
                    </div>
                </div>
                <!-- Input Correo Electrónico -->
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group row" id="divContraseña">
                    <!-- Input Contraseña -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <!-- Input Confirmar Contraseña -->
                    <div class="col-sm-6">
                        <label for="password_confirmation">Confrimas contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal Eliminar-->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <h1 class="text-danger">¿Está seguro que desea eliminar?</h1>
            <h2>Cliente: <strong id="laboratorista"></strong></h2>
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
        $('#nuevoModal').modal({show: true});
        $('#tituloModal').text('Nuevo cliente');
        $('#cedula').val("");
        $('#apellido').val("");
        $('#nombre').val("");
        $('#estado').val("");
        $('#direccion').val("");
        $('#provincia').val("");
        $('#canton').val("");
        $('#email').val("");
        $('#divContraseña').show();
    }

    function editar(cedula, apellido, nombre, estado, direccion, provincia, canton,  email) {
        $('#nuevoModal').modal({show: true});
        $('#tituloModal').text('Editar cliente');
        $('#cedula').val(cedula);
        $('#apellido').val(apellido);
        $('#nombre').val(nombre);
        $('#estado').val(estado);
        $('#direccion').val(direccion);
        $('#provincia').val(provincia);
        $('#canton').val(canton);
        $('#email').val(email);
        $('#divContraseña').hide();
    }

    function eliminar(cedula) {
        $('#eliminarModal').modal({show: true});
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
