@php
    $timePosted = Carbon\Carbon::createFromTimeStamp(strtotime($post->postTijd))->diffForHumans();
@endphp
<article class="post">
    <a href="/post/{{ $post->postId }}">
        <div>
            <p>{{ $post->postTitel }}</p>
            <p>Door: {{ $post->username }}</p>
            <pre>{{ $post->postBeschrijving }}</pre>
            <p>{{ $timePosted }}</p>
            <p>{{ $post->categorieBeschrijving }}</p>
        </div>
    </a>
</article>