@props([
    'headers' => null,
    'rows'    => null
])

  <table class="table-fixed">
      @if($headers)
          <thead>
              <tr>
                  @foreach($headers as $header)
                      <th>{{ $header }}</th>
                  @endforeach
              </tr>
          </thead>
      @endif
      <tbody>
          @if($rows)
              @foreach($rows as $row)
                  <tr>
                      @foreach($row as $cell)
                          <td>{{ $cell }}</td>
                      @endforeach
                  </tr>
              @endforeach
          @endif
      </tbody>
  </table>
