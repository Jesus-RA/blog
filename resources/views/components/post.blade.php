<div class="col-md-4 col-12 justify-content-center mb-5">
    <div class="card m-auto" style="width: 18rem;">
        <img class="card-img-top" src="{{asset($post->image)}}" alt="Post Python">
        <div class="card-body">
            <small class="card-txt-category">Categoría: {{ $post->category->name }}</small>
            <h5 class="card-title my-2">{{ $post->title }}</h5>
            <div class="d-card-text">
                {{ Str::words( strip_tags($post->content), 25) }}
            </div>
            <a href="{{ route('posts.show', $post) }}" class="post-link"><b>Leer más</b></a>
            <hr>
            <div class="row">
                <div class="col-6 text-left">
                    <span class="card-txt-author">{{ $post->author->name }}</span>
                </div>
                <div class="col-6 text-right">
                    <span class="card-txt-date">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>