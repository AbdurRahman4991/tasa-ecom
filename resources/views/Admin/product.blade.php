@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> + Add new product</button>
            <div class="table-responsive">
                <table id="product-table" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Material</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Front Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data will be dynamically populated --}}
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@include('Modal.Product.add')
@include('Modal.Product.edit')
@include('Modal.Product.details')
@include('Modal.Product.delete')


@endsection


