<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body py-4">
                <h3 class="card-title text-center m-0">Are you sure to delete this record?</h3>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary px-4 m-0" data-dismiss="modal">No</button>
                <form action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary px-4 m-0">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>