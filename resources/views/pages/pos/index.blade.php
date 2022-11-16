@extends('layouts.app')

@section('deskapp_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="mb-30">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control form-control-sm border border-secondary" data-toggle="modal" data-target="#searchProduct" placeholder="Click to search">
                        </div>
                        <div class="col-4">
                            <div class="btn-group btn-block" role="group">
                                <button type="button" class="btn btn-danger btn-sm m-0"><i class="icon-copy ion-close-round mr-1"></i> CANCEL SALE</button>
                                <button type="button" class="btn btn-warning btn-sm m-0"><i class="icon-copy fa fa-pause mr-1" aria-hidden="true"></i> PAUSE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            {{-- <div class="card card-box">
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
            </div> --}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="searchProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control border border-secondary" id="searchText" placeholder="Search item">
            </div>
            <div class="modal-body">
                <p class="text-center text-secondary m-0">No product found</p>
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
    // Search modal
    $('#searchProduct').on('show.bs.modal', function () {
        $(this).find('.modal-body').remove()
    })
    // Search item
    $('#searchText').on('keyup', function (event) {
        const modal = $('#searchProduct')
        let rowData = ''
        if (this.value.length >= 3) {
            if (!modal.find('.modal-body').length) {
                modal.find('.modal-content').append(
                    `<div class="modal-body">
                    </div>`
                )
            }
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}})
            $.ajax({
                url: "{{ route('search.product') }}",
                method: "POST",
                data: {search: this.value},
                success: function (result) {
                    const array = result.products
                    if (array.length > 0) {
                        array.filter(function (row) {
                            rowData += `<tr><td>${row['name']}</td></td>`
                        })
                        modal.find('.modal-body').empty().append(
                            `<div class="table-responsive rounded-lg">
                                <table class="table table-borderless table-hover table-sm mb-0">
                                    <tbody>
                                        ${rowData}
                                    </tbody>
                                </table>
                            </div>`
                        )
                    } else {
                        modal.find('.modal-body').empty().append(`<p class="text-center text-secondary m-0">No product found</p>`)
                    }
                }
            })
        }
    })

    // Preview
    $('#previewImage').on('show.bs.modal', function (event) {
        $(this).find('img').attr('src', $(event.relatedTarget).data('image'))
    })
</script>
@endsection