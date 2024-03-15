@extends('components.layout.layout')

@section('main')
    <h1 class="page-title">Mentors and students</h1>

    <p class="add-part">
        <button class="btn btn-secondary" onclick="toggleAddingDiv()">Add new group</button>
    </p>

    @include('components.forms.mentor_add')

{{--    <x-windows.edit-mentor :$members :mentor="$mentorStudents[0]"/>--}}

    @if(count($mentorStudents))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Mentor</th>
                <th scope="col">Students</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
        @foreach($mentorStudents as $mentor)
            <tr>
                <th scope="row">
                    {{$mentor['name']}} {{$mentor['lastname']}}
                </th>
                <td>
                    @foreach($mentor['students'] as $student)
                        {{$student['name']}} {{$student['lastname']}}<br>
                    @endforeach
                </td>
                <td>
                    <img
                        src="{{asset('images/edit.png')}}"
                        alt="edit"
                        onclick="createMentorWindow({{$members}}, {{$mentor}})"
                    >
                </td>
                <td>
                    <img
                        src="{{asset('images/trash.png')}}"
                        alt="delete"
                        onclick="alertDeleteWindow('mentor', {{$mentor['id']}})"
                    >
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
        Still empty!
    @endif
@endsection
