<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Show Book</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Book
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('books_page') }}">Show</a></li>
                        <li><a class="dropdown-item" href="{{ route('add_books_page') }}">Add</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @foreach ($books as $b)
        <div class="card m-5" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $b->title }}</h1>
                <h2 class="card-subtitle mb-2">{{ $b->category->category_name }}</h2>
                <h4>Author</h4>
                @foreach ($b->author as $a)
                    <p class="card-subtitle mb-2">{{ $a->author_name }}</p>
                @endforeach
                <p class="card-text">{{ $b->isbn }}</p>
                <p class="card-text">{{ $b->release_date}}</p>
                <p class="card-text">{{ $b->synopsis }}</p>
                <p class="card-text">Total Page: {{ $b->page }}</p>
                <p class="card-text">Stocks: {{ $b->stocks }}</p>
                <div class="d-flex">
                    <a href="{{ route('edit_books_page', ['id'=>$b->id]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('add_author_page', ['id'=>$b->id]) }}" class="btn btn-secondary mx-2">Add Author</a>
                    <form action="{{ route('delete_books', ['id'=>$b->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>
