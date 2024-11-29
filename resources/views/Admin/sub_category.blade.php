@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> + Add sub category</button>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Shirt</td>
                        <td>T-shirt, Polo-shirt,</td>
                        <td>
                            <i data-bs-toggle="modal" data-bs-target="#editeModal" class="fa-regular fa-pen-to-square"></i>
                            <i data-bs-toggle="modal" data-bs-target="#deleteModal" class="fa-solid fa-trash"></i>
                        </td>

                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Sub category</th>
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
