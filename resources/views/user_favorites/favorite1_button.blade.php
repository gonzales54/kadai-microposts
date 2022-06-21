@if (Auth::user()->is_favorite($favorite->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $favorite->id], 'method' => 'store']) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-light btn-sm"]) !!}
    {!! Form::close() !!}
@endif