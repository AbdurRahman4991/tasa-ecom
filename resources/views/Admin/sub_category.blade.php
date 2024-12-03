@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> + Add sub category</button>
            <table id="subcategory" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Category</th> <!-- Matches category.name -->
                        <th>Subcategory</th> <!-- Matches name -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Ajax data --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

@include('Modal.Sub_category.add_sub_category')
@include('Modal.Sub_category.edit_sub_category')
@include('Modal.Sub_category.delete_sub_category')
@endsection

