<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Add Book</title>
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
    <h1 class="mx-5">Add Book</h1>
    <form class="p-5" method="POST" action="{{ route('add_books') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <select class="form-select" aria-label="Default select example" name="category">
                <option selected>Category</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="publisher">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Synopsis</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="synopsis"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="isbn">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="release_date">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Page</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="page">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stocks</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="stocks">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
