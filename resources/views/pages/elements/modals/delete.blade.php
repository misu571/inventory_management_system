<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <i class="icon-copy dw dw-warning-1 text-warning fa-4x"></i>
                </div>
                <p class="h4 m-0">Are you sure to delete this record?</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary px-4 m-0" data-dismiss="modal" onclick="$('#deleteEntryForm').attr('action', '#')">No</button>
                <form action="#" id="deleteEntryForm" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary px-4 m-0">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>