<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('post.create') ? 'active' : ''}}" aria-current="page" href="{{ route('post.create') }}">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('post.view') ? 'active' : '' }}" href="{{ route('post.view') }}">All Post</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('post.search') }}" method="GET">
                <input name="search" value="{{ request('search') }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
