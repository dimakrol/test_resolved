<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Neurony Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3 mb-5">Posts ({{ $posts->count() }})</h1>
                <form class="form-inline my-2 my-lg-0">
                    <input name="keyword" class="form-control mr-sm-2" type="text" placeholder="Search" value="{{ request()->get('keyword') }}">
                    <select name="active" class="form-control mr-sm-2">
                        <option value="">Active</option>
                        <option value="1" {{ request()->filled('active') && request()->get('active') == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request()->filled('active') && request()->get('active') == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    <select name="sort" class="form-control mr-sm-2">
                        <option value="">Sort</option>
                        <option value="latest" {{ request()->filled('sort') && request()->get('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="alphabetical" {{ request()->filled('sort') && request()->get('sort') == 'alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                    </select>
                    <button class="btn btn-outline-success my-2 mx-2 my-sm-0" type="submit">Search</button>
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('home') }}">Reset</a>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-12 mt-3 mb-3">
                        <h2>
                            #{{ $post->id }} {{ $post->name }}
                            <span class="btn {{ $post->active ? 'btn-success' : 'btn-danger' }}">
                                {{ $post->active ? 'Active' : 'Inactive' }}
                            </span>
                        </h2>
                        <p>{{ $post->content }}</p>
                    </div>
                @empty
                    <div class="col-md-12 mt-3 mb-3">
                        <h3>No posts yet...</h3>
                    </div>
                @endforelse
            </div>
            <hr>
        </div>
    </main>
</body>
</html>
