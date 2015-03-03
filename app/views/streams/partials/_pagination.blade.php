{{ DBug::DBug($offset) }}
{{ DBug::DBug($limit) }}
{{ DBug::DBug($total) }}
{{ DBug::DBug((($offset + $limit) < $total)) }}
<nav>
  <ul class="pagination pagination-lg">
    <li class="{{ ($offset == 0) ? 'disabled' : '' }}">
      <a href="{{ action('StreamController@index', ['limit' => $limit, 'offset' => max($offset - $limit, 0)]) }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @for($i = 0; $i < $total; $i += $limit)
      <li class="{{ ($i == $offset) ? 'active' : '' }}"><a href="{{ action('StreamController@index', ['limit' => $limit, 'offset' => $i]) }}">{{ (($i/$limit) + 1) }}</a></li>
    @endfor
    <li class="{{ ($offset + $limit < $total) ? '' : 'disabled' }}">
      <a href="{{ action('StreamController@index', ['limit' => $limit, 'offset' => min($offset + $limit, $total)]) }}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
