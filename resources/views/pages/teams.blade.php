@extends('components.layout.layout')

@section('main')
    <h1 class="page-title">Teams</h1>

    <p class="add-part">
        <button class="btn btn-secondary" onclick="toggleAddingDiv()">Add new team</button>
    </p>

    @include('components.forms.team_add')

{{--    <x-windows.edit-team :$teamleads :$members :team="$teams[0]" />--}}

    @if(count($teams))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Teamlead</th>
                <th scope="col">Teammates</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
        @foreach($teams as $team)
            <tr>
                <th scope="row">{{$team['name']}}</th>
                <td>{{$team['owner']['name']}} {{$team['owner']['lastname']}}</td>
                <td>
                    @if(count($team['teammates']))
                        @foreach($team['teammates'] as $teammate)
                            {{$teammate['name']}} {{$teammate['lastname']}}<br>
                        @endforeach
                    @else -
                    @endif
                </td>
                <td>
                    <img
                        src="{{asset('images/edit.png')}}"
                        alt="edit"
                        onclick="createTeamWindow({{$teamleads}}, {{$members}}, {{$team}})"
                    >
                </td>
                <td>
                    <img
                        src="{{asset('images/trash.png')}}"
                        alt="delete"
                        onclick="alertDeleteWindow('team', {{$team['id']}})"
                    >
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
        Still have not teams!
    @endif
@endsection
