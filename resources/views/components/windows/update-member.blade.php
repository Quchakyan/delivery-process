<div class="window">
    <form action="{{route('member_update')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$member['id']}}">
        <div class="form-group">
            <label>Name
                <input value="{{$member['name']}}" type="text" class="form-control" name="name" placeholder="Name">
            </label>
            <label>Lastname
                <input value="{{$member['lastname']}}" name="lastname" type="text" class="form-control" placeholder="Lastname">
            </label>
        </div>
        <div class="form-group">
            <label>
                Position
                <select class="form-control" name="position_id">
                    @foreach($positions as $position)
                        <option
                            value="{{$position['id']}}"
                            @if($position['id'] === $member['position_id'])
                                selected
                            @endif
                        >
                            {{$position['name']}}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Role
                <select class="form-control" name="role_id">
                    @foreach($roles as $role)
                        <option
                            value="{{$role['id']}}"
                            @if($role['id'] === $member['role_id'])
                                selected
                            @endif
                        >
                            {{$role['name']}}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>
                Mentor
                <select class="form-control" name="mentor_id">
                    <option selected value={{null}}>Mentor</option>
                    @foreach($mentors as $mentor)
                        <option
                            value="{{$mentor['id']}}"
                            @if($mentor['id'] === $member['mentor_id'])
                                selected
                            @endif
                        >
                            {{$mentor['name']}} {{$mentor['lastname']}}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>
                Manual Busyness
                <input value="{{$member['manual_busyness']}}" type="text" class="form-control" name="manual_busyness" placeholder="Manual Busyness">
            </label>
        </div>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="button">Close</button>
        </div>
    </form>
</div>
