@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-2">
        <div class="row">
            <div class="col-md-6 ">
                <h6 class="m-0 font-weight-bold text-primary mt-2">Administración de Análisis</h6>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-outline-primary text-right"><i class="fas fa-plus-circle"></i> Nuevo</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
