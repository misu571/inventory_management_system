@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="mb-30">
    <div class="row">
        <div class="col-5">
            <div class="card card-box">
                <div class="card-body">
                    <h5 class="card-title">Buy & Sell</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-box">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table checkbox-datatable stripe hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="dt-checkbox">
                                            <input type="checkbox" name="select_all" value="1" id="example-select-all" />
                                            <span class="dt-checkbox-label"></span>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Sub-category</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @php $image = $product->image ? asset('storage/products/' . $product->image) : asset('images/product_icon.png') @endphp
                                        <a href="#previewImage" role="button" data-toggle="modal" data-image="{{ $image }}">
                                            <img class="img-thumbnail" data-toggle="tooltip" title="Click to preview" src="{{ $image }}" alt="" width="100">
                                        </a>
                                    </td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->sub_category_name }}</td>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview image modal -->
@include('pages.elements.modals.preview_image')
@endsection

@section('deskapp_scripts')
<script src="{{ asset('deskapp/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('deskapp/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('deskapp/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
<!-- Datatable Setting js -->
<script src="{{ asset('deskapp/vendors/scripts/datatable-setting.js') }}"></script>
<script>
    // Preview
    $('#previewImage').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let modal = $(this)
        modal.find('img').attr('src', button.data('image'))
    })
</script>
@endsection