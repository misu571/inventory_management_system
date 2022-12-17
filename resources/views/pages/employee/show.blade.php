@extends('layouts.app')

@section('content')
<x-pages.elements.title title="Show" route="{{ route('employee.index') }}" parentPage="employee" currentPage="details" />
<div class="row">
    <div class="col-md-3 mb-30 mb-md-0">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <a href="#uploadImage" data-toggle="modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                <img src="{{ $employee->image ? asset('storage/employees/avatar/' . $employee->image) : asset('images/avatar.png') }}" alt="" class="avatar-photo border border-secondary rounded-circle">
                <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="modalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('employee.image.update', [$employee->employee_id]) }}" method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Update profile picture</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body text-center p-3">
                                    <div class="img-container mb-3">
                                        <img id="thumbnail" src="{{ $employee->image ? asset('storage/employees/avatar/' . $employee->image) : asset('images/avatar.png') }}" alt="Picture" class="">
                                    </div>
                                    <div class="form-group m-0">
                                        <input type="file" id="image" name="image" class="form-control-file form-control height-auto @error('image') is-invalid @enderror" required>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-center h5 mb-0">{{ $employee->name }}</h5>
            <p class="text-center text-muted font-14">{{ $employee->position }}</p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                <ul>
                    <li>
                        <span>Email Address:</span>
                        {{ $employee->email }}
                    </li>
                    <li>
                        <span>Phone Number:</span>
                        {{ $employee->phone }}
                    </li>
                    <li>
                        <span>Address:</span>
                        {{ $employee->address ?? '--' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card-box">
            <div class="row p-4">
                <div class="col-md-8" style="border-right: 2px dashed #ecf0f4;">
                    <h4 class="text-blue h5 mb-30">Personal Details</h4>
                    <x-forms.employee.edit action="{{ route('employee.update', [$employee->employee_id]) }}">
                        <x-slot:method_type>
                            @method('PATCH')
                        </x-slot>
                        <x-slot:name_value>{{ old('name') ?? $employee->name }}</x-slot>
                        <x-slot:phone_value>{{ old('phone') ?? $employee->phone }}</x-slot>
                        <x-slot:position_value>{{ old('position') ?? $employee->position }}</x-slot>
                        <x-slot:nid_value>{{ old('nid') ?? $employee->nid }}</x-slot>
                        <x-slot:salary_value>{{ old('salary') ?? $employee->salary }}</x-slot>
                        <x-slot:address_value>{{ old('address') ?? $employee->address }}</x-slot>
                        <x-slot:button>
                            <i class="icon-copy ion-android-create mr-2"></i> Edit Details
                        </x-slot>
                    </x-forms.employee.edit>
                </div>
                <div class="col-md">
                    <div class="mb-3" style="border-bottom: 2px dashed #ecf0f4;">
                        <h4 class="text-blue h5 mb-30">Update E-mail</h4>
                        <form method="POST" action="{{ route('employee.email.update', [$employee->employee_id]) }}">
                            @method('PATCH')
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $employee->email }}" aria-describedby="email-button">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit" id="email-button">Update</button>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <h4 class="text-blue h5 mb-30">Change Password</h4>
                    <form method="POST" action="{{ route('employee.password.update', [$employee->employee_id]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="input-group custom">
                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="New Password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @else
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            @enderror
                        </div>
                        <div class="input-group custom">
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required autocomplete="new-password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mt-5">
                            <button type="submit" class="btn btn-lg btn-primary m-0">
                                <i class="icon-copy ion-android-create mr-2"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('deskapp_scripts')
<script>
    // Preview image before upload
    image.onchange = evt => {
        const [file] = image.files
        if (file) {thumbnail.src = URL.createObjectURL(file)}
    }
</script>
@endsection