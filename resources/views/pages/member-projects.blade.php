@extends('components.layout.layout')

@section('main')
{{--    <x-windows.edit-member-project :data="$membersData[1]" :$projects />--}}
    <h1 class="page-title">Members / Projects</h1>
    @if(count($membersData))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Full name</th>
                <th scope="col">Own projects</th>
                <th scope="col">Projects</th>
                <th scope="col">Role in project</th>
                <th scope="col">Is official</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
        @foreach($membersData as $member)
            <tr>
                <th scope="row">
                    {{$member['name']}} {{$member['lastname']}}
                </th>
                <td>
                    @if(count($member['ownProjects']))
                        @foreach($member['ownProjects'] as $project)
                            {{$project['name']}}<br>
                        @endforeach
                    @else -
                    @endif
                </td>
                <td>
                    @if(count($member['projects']))
                        @foreach($member['projects'] as $project)
                            {{$project['name']}}<br>
                        @endforeach

                    @else -
                    @endif
                </td>
                <td>
                    @if(count($member['projectStats']))
                        @foreach($member['projectStats'] as $stat)
                            {{$stat['role_in_project']}}<br>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if(count($member['projectStats']))
                        @foreach($member['projectStats'] as $stat)
                            @if($stat['is_official'])
                                Yes
                            @else
                                No
                            @endif
                            <br>
                        @endforeach
                    @endif
                </td>
                <td>
                    <img
                        src="{{asset('images/edit.png')}}"
                        onclick="createComponent({{$member}}, {{$projects}})"
                        alt="edit"
                    />
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
        Still have not members!
    @endif


@endsection
