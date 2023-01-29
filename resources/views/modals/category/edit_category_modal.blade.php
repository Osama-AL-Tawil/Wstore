<!--Modal-->

<div class="modal text-left" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('category.update')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <strong>Category Name</strong>
                        <input id="category-name" name="category_name" type="text" class="form-control" value="">
                        <input id="category-id" name="id" type="hidden" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </form>

        </div>
    </div>
</div>
<!--Modal-->
