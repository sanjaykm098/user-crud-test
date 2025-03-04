<div class="modal-dialog modal-lg">
    <form method="post" action="{{ route('todo.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row g-4">
                <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="col-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>

                <div class="col-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" multiple name="images[]" accept="image/*">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
