<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @for($i = 0; $i < $total; $i += $limit)
      <li><a href="{{ action('StreamController@index', ['limit' => $limit, 'offset' => $i]) }}">{{ (($i/$limit) + 1) }}</a></li>
    @endfor
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
