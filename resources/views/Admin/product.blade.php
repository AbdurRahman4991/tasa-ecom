@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product </div>
                <div class="card-body">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">+ Add product</button>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>image</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                                <td>
                                    <i data-bs-toggle="modal" data-bs-target="#editeModal" class="fa-solid fa-pen-to-square"></i>
                                    <i class="fa-regular fa-eye" data-bs-toggle="modal" data-bs-target="#detailsModal"></i>
                                    <i data-bs-toggle="modal" data-bs-target="#deleteModal" class="fa-solid fa-trash"></i>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>image</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Modal.Product.add')
@include('Modal.Product.edit')
@include('Modal.Product.details')
@include('Modal.Product.delete')
@endsection
