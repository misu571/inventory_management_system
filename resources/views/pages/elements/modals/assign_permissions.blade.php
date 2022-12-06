<div class="modal fade" id="assignPermissions" tabindex="-1" aria-labelledby="assignPermissionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignPermissionsLabel">Assign Permissions to Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                <input type="hidden" id="permissions" name="permissions" value="">
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label>Multiple Select</label>
                        <select class="custom-select2 form-control @error('permissions') is-invalid @enderror" onchange="$('#permissions').val($(this).val())" multiple="multiple" style="width: 100%">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>