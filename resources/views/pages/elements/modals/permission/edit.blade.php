<div class="modal fade" id="permissionEdit" tabindex="-1" aria-labelledby="permissionEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionEditLabel">Edit permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#permissionEditForm').attr('action', '#')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="permissionEditForm" method="post">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Permission name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="icon-copy ion-android-create mr-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>