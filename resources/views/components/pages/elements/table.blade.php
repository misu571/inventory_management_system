<table class="table data-table stripe hover">
    <thead>
        <tr>
            <th>#</th>
            @foreach ($listName($colunm_name) as $item)
                <th>{{ $item }}</th>
            @endforeach
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>