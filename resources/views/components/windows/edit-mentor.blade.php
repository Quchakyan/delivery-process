<div class="window">
    <form action="{{route('mentor_operate')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>
                Mentor: {{$mentor['name']}} {{$mentor['lastname']}}
                <input type="hidden" name="mentor_id" value="{{$mentor['id']}}">
            </label>
        </div>
            <label>
                Students
                <select class="form-control" name="student_ids[]" multiple>
                    @foreach($members as $member)
                        @if($member['id'] !== $mentor['id'])
                        <option value="{{$member['id']}}">
                            {{$member['name']}} {{$member['lastname']}}
                        </option>
                        @endif
                    @endforeach
                </select>
            </label>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="button">Close</button>
        </div>
    </form>
</div>

