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

    <h3>Update Notes</h3>
    <form action="{{ route('notes.update', ['id' => $note->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <input
                ng-model="yourTask.title"
                type="text"
                class="form-control mb-3"
                id="formGroupExampleInput"
                placeholder="Title"
                name="title"
                value="{{$note->title}}"
            />

            <input
                ng-model="yourTask.description"
                type="text"
                class="form-control mb-3"
                id="formGroupExampleInput"
                placeholder="Description"
                name="description"
                value="{{$note->description}}"
            >

            <select
                ng-model="yourTask.status"
                class="form-control mb-3"
                id="formGroupExampleInput"
                name="status"
            >
                <option value="{{$note->status}}">Select your task status</option>
                <option value="Not Started">Not Started</option>
                <option value="In Progress">In Progress</option>
                <option value="Due">Due</option>
                <option value="Done">Done</option>
            </select>
        </div>

        <input
            type="submit"
            class="btn btn-primary mr-3"
            value="Update notes"
        >

    </form>






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
