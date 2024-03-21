<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"
    />

    <style>
        .app-container {
            height: 100vh;
            width: 100%;
        }
        .complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<div
    class="app-container d-flex align-items-center justify-content-center flex-column"
    ng-app="myApp"
    ng-controller="myController"
>

    <h3>Search Result</h3>



    <div class="search-input" style="margin-bottom: 20px; margin-left: 20px;">
        <form action="{{ route('notes.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search..." class="form-control">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="table-wrapper">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->description }}</td>
                    <td>{{ $note->status }}</td>
                    <td style="display: flex; justify-content: space-between;">
                        <form action="{{ route('notes.delete', $note->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('notes.edit', ['id' => $note->id]) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-primary mr-3" value="Update">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{route('notes.list')}}"  ><button type="submit" class="btn btn-primary" style="margin-bottom: 20px" >View ALL NOTES</button></a>






</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
</body>
</html>
