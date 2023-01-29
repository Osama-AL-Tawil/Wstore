@if($data->lastPage()!=1)
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center flex-wrap">
        <li class="page-item">
            <a
                class="page-link"
                href="{{ $data->previousPageUrl() }}">Previous
            </a>
        </li>

        @for ($i = 1; $i <= $data->lastPage(); $i++)

            <li class="page-item {{$data->currentPage() == $i ? 'active' : ''}}">
                <a
                    class="page-link"
                    href="{{ $data->url($i) }}">{{$i}}
                </a>
            </li>
        @endfor

        <li class="page-item">
            <a class="page-link"
               href="{{ $data->nextPageUrl() }}">Next
            </a>
        </li>
    </ul>
</nav>
@endif
