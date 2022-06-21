@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
            <li class="media mb-3">
                <img class="mr-2 rounded" src="{{ Gravatar::get($favorite->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {!! link_to_route('users.show', $favorite->user->name, ['user' => $favorite->user->id]) !!}
                        <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                    </div>
                    <div>
                        <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                    <div class="d-flex">
                        @include('user_favorites.favorite1_button')
                        
                        @if (Auth::id() == $favorite->user_id)
                            {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $favorites->links() }}
@endif