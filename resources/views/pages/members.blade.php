@extends('components.layout.layout')

@section('main')
    <h1 class="page-title">Members</h1>
    <p class="add-part">
        <button onclick="toggleAddingDiv()" class="btn btn-secondary">Add new member</button>
    </p>

    @include('components.forms.member_add')

{{--    <x-windows.update-member :$roles :$positions :$mentors :member="$members[0]"/>--}}

    @if(count($members))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Full name</th>
                <th scope="col">Position</th>
                <th scope="col">Role</th>
                <th scope="col">Automatic busyness</th>
                <th scope="col">Manual busyness</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
        @foreach($members as $member)
            <tr>
                <th scope="row">
                    {{$member['name']}} {{$member['lastname']}}
                </th>
                <td contenteditable="true">{{$member['position']['name']}}</td>
                <td>{{$member['role']['name']}}</td>
                <td>{{$member['automatic_busyness']}}</td>
                <td>{{$member['manual_busyness']}}</td>
                <td>
                    <img src="{{asset('images/edit.png')}}"
                         alt="edit"
                         onclick="createMemberWindow({{$roles}},{{$positions}},{{$mentors}}, {{$member}})">
                </td>
                <td>
                    <img
                        src="{{asset('images/trash.png')}}"
                        alt="delete"
                        onclick="alertDeleteWindow('member', {{$member['id']}})"
                    >
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
        Still have not members!
    @endif

@endsection
