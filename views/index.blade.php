<div class="container">
    <ul>
        <li><a href="{{ Request::path() }}">Page</a></li>
        <li><a href="{{ route('wiki.page.edit') }}">Edit</a></li>
        <li><a href="{{ route('wiki.page.history') }}">History</a></li>
    </ul>
</div>

<div class="container">
    <h2>Page</h2>
    {{ $wiki->title }}
    {{ $wiki->slug }}
    {{ $wiki->content }}
</div>
