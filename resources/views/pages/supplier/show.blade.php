@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Show" route="{{ route('supplier.index') }}" parentPage="supplier" currentPage="details" />
<div class="row">
    <div class="col-md-6">
        <div class="card-box p-3 mb-30">
            <div class="card card-box">
                <div class="card-header">Featured</div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                    </p>
                    <a href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection