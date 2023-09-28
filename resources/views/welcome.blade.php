<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
      <form action="{{ route('url.create') }}" method="POST">
        @csrf
        <input type="text" name="url">
        <input type="submit">
      </form>

      <table border="1">
         <tr>
            <td>Id</td>
            <td>Link</td>
         </tr>
         @foreach($links as $link)
         <tr>
            <td>{{ $link->id }}</td>
            <td>
              <a href='{{ asset("/{$link->token}") }}'>
                {{ asset("/{$link->token}") }}
              </a>
            </td>
         </tr>
         @endforeach
      </table>
    </body>
</html>
