
<div class="grid md:grid-col-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 my-10">
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="shadow-lg">
                <a href="{{ route('post.show',['user' => $post->usuario, 'post' => $post]) }}">
                    <img src="{{ asset('storage/galeria') . '/' . $post->imagen }}" alt="imagen">
                </a>
            </div>
        @endforeach
    @else
        <div>
            <p class="text-center text-6xl my-4">No hay publicaciones aún</p>
        </div>
    @endif
</div>