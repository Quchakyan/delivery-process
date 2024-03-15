@extends('components.layout.layout')

@section('main')
    <h1 class="page-title">Projects</h1>

    <p class="add-part">
        <button class="btn btn-secondary" onclick="toggleAddingDiv()">Add new project</button>
    </p>

    @include('components.forms.project_add')

{{--    <x-windows.update-project :$members :$currencies :project="$projects[0]"/>--}}

    @if(count($projects))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Project name</th>
                <th scope="col">Owner</th>
                <th scope="col">Rate</th>
                <th scope="col">Bid</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project['name']}}</th>
                    <td>{{$project['owner']['name']}} {{$project['owner']['lastname']}}</td>
                    <td>{{$project['rate']}} {{$project['currency']['name']}}</td>
                    <td>{{$project['bid']}}</td>
                    <td>
                        <img src="{{asset('images/edit.png')}}"
                             onclick="createProjectWindow({{$project}}, {{$members}}, {{$currencies}})"
                             alt="edit" >
                    </td>
                    <td>
                        <img
                            src="{{asset('images/trash.png')}}"
                            alt="delete"
                            onclick="alertDeleteWindow('project', {{$project['id']}})"
                        >
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        Still have not projects!
    @endif

@endsection
