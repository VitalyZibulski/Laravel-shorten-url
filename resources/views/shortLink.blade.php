<div>
    <form method="POST" action="{{ route('generate.short-link-create') }}">
        @csrf
        <input type="text" name="link">
        <button class="btn btn-success" type="submit">Short link</button>
    </form>
</div>
<div class="card-body">
    @if(Session::has('success'))
        <div class="alert alert success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Short link</th>
                <th scope="col">Original link</th>
                <th scope="col">Visits</th>
            </tr>
            </thead>
            <tbody>
                @foreach($shortLinks as $shortLink)
                <tr>
                    <td>{{$shortLink->id}}</td>
                    <td>
                        <a href="{{ route('short.link', $shortLink->short_code) }}"
                            target="_blank">{{ route('short.link', $shortLink->short_code) }}</a>
                    </td>
                    <td>{{$shortLink->original_link}}</td>
                    <td>{{$shortLink->visits}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

