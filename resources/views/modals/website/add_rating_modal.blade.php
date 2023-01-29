<!--Modal-->

    <div class="modal text-left" style="direction: ltr" id="addRatingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('ws.rating')}}">
                    @csrf
                    <input type="hidden" id="store-id" name="id">
                    <input type="hidden" id="rating" name="rating">
                    <div class="modal-body">
                        <div id="modal-message" class="alert alert-warning" role="alert">
                            Do you want to rate this store
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Rating Now</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--Modal-->


