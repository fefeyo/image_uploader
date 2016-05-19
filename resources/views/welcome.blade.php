<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アップローダー</title>
    </head>
    <body>
        <form action="/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="image"><br />
            <input type="submit">
        </form>
        @foreach($images as $image)
            <img src="{{ $image }}" width="100" /><br />
        @endforeach
        {{ session('status') }}
    </body>
</html>
