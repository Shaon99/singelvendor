<!DOCTYPE html>
<html>
<head>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>
@if ($paginator->hasPages())

<div class="pagination">
  {{-- <a href="#">&laquo;</a> --}}
  @if ($paginator->onFirstPage())

  @else


          <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>

  @endif
  @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))

                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <a class="active" aria-current="page"><span>{{ $page }}</span></a>
                        @else

                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

              {{-- Next Page Link --}}
              @if ($paginator->hasMorePages())

                  <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>

          @else
              <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                  <span aria-hidden="true">&rsaquo;</span>
              </a>
          @endif




</div>

@endif

</body>
</html>


