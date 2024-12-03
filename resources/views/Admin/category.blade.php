@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> + Add category</button>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Shwo ajax data --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@include('Modal.Category.add_category')
@include('Modal.Category.edit_category')
@include('Modal.Category.delete_category')

<script src="{{asset('../assets/js/category.js')}}"></script>
@endsection


