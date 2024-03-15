<div class="window">
    <form action="{{route('team_operate')}}" method="POST">
        @csrf
        <input type="hidden" name="team_id" value="{{$team['id']}}">
        <div class="form-group">
            <label>
                Name
                <input value="{{$team['name']}}" type="text" class="form-control" name="name" placeholder="Name">
            </label>
            <label>
                Owner
                <select class="form-control" name="owner_id">
                    @foreach($members as $member)
                        <option
                            value="{{$member['id']}}"
                            @if($member['id'] === $team['owner_id'])
                                selected
                            @endif
                        >
                            {{$member['name']}} {{$member['lastname']}}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label Select Teammates>
                <select class="form-control" name="teammate_ids[]" multiple>
                    @foreach($members as $member)
                        @if($member['id'] !== $team['owner_id'])
                            <option
                                value="{{$member['id']}}"
                            >
                                {{$member['name']}} {{$member['lastname']}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="button">Close</button>
        </div>
    </form>
</div>

