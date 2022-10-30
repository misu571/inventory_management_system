<div class="dropdown">
    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
        <a class="dropdown-item" href="{{ route($name . '.show', [$nameId]) }}"><i class="dw dw-eye"></i> View</a>
        <a class="dropdown-item" href="{{ route($name . '.edit', [$nameId]) }}"><i class="dw dw-edit2"></i> Edit</a>
        <a class="dropdown-item" role="button" href="#deleteModal" data-toggle="modal" data-route="{{ route($name . '.destroy', [$nameId]) }}"><i class="dw dw-delete-3"></i> Delete</a>
    </div>
</div>