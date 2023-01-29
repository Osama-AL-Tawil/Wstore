<!--Modal-->

<div class="modal text-left" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('category.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <strong>Category Name</strong>
                        <input name="category_name" type="text" class="form-control">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>

                </div>
            </form>

        </div>
    </div>
</div>
<!--Modal-->
