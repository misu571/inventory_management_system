<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>{{ $title }}</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ $route }}">{{ $parentPage }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $currentPage }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>