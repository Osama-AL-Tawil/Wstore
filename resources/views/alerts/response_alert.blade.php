@if(session()->has('response'))
    @if(session('response')['status']==0)
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <strong>Failed: </strong> {{session('response')['message']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('response')['status']==1)
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Success: </strong> {{session('response')['message']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('response')['status']==2)
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <strong>Failed: </strong> {{session('response')['message']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endif
