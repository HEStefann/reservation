<div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit form goes here -->
                <form id="editForm">
                    <div class="mb-3">
                        <label for="editFullNameInput" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="editFullNameInput">
                    </div>
                    <!-- More input fields for other reservation details go here -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning text-dark" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesButton">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
