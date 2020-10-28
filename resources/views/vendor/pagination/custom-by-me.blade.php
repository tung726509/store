@if ($paginator->hasPages())
  <style type="text/css">
      .pagination-container {
        margin: 0px;
        text-align: center;
      }
      .pagination {
        position: relative;
      }
      .pagination a {
        position: relative;
        display: inline-block;
        color: #2c3e50;
        text-decoration: none;
        font-size: 1.2rem;
        padding: 7px 12px 7px;
        border: 0px;
      }
      .pagination a:before {
        z-index: -1;
        position: absolute;
        height: 100%;
        width: 100%;
        content: "";
        top: 0;
        left: 0;
        background-color: #2c3e50;
        border-radius: 24px;
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all 0.2s;
        transition: all 0.2s;
      }
      .pagination a:hover,
      .pagination a.pagination-active {
        color: #fff;
      }

      .pagination a:hover{
        background-color: white !important;
      }

      .pagination a:hover:before,
      .pagination a.pagination-active:before {
        -webkit-transform: scale(1);
        transform: scale(1);

      }
      .pagination span{
        border : 0px;
      }
      .pagination.pagination-active {
        color: #fff;
      }
      .pagination.pagination-active:before {
        -webkit-transform: scale(1);
        transform: scale(1);
      }
      .pagination-newer {
      }
      .pagination-older {
      }
      .tranY{
        transform: translateY(7px);
      }
      .txt-silver{
        color: silver;
      }
      .txt-silver:hover{
        -webkit-transform: scale(0);
        transform: scale(0);
      }
      .pagination div{
        position: relative;
        display: inline-block;
        color: silver;
        text-decoration: none;
        font-size: 1.2rem;
        padding: 5px 10px 5px;
        border: 0px;
      }
  </style>
  <nav class="pagination-container">
      <div class="pagination">
        @if ($paginator->onFirstPage())
          <div class="txt-silver disabled"><i class="fas fa-chevron-left tranY"></i></div>
        @else
          <a class="pagination-newer" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left tranY"></i></a>
        @endif

        <span class="pagination-inner">
          {{-- Pagination Elements --}}
          @foreach($elements as $element)
              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $paginator->currentPage())
                        <a class="pagination-active" href="#">{{ $page }}</a>
                        {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}
                      @else
                        <a href="{{ $url }}">{{ $page }}</a>
                      @endif
                  @endforeach
              @endif
          @endforeach
        </span>

        @if($paginator->hasMorePages())
          <a class="pagination-older" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right tranY"></i></a>
        @else
          <div class="txt-silver disabled"><i class="fas fa-chevron-right tranY"></i></div>
        @endif
      </div>
  </nav>
@endif
