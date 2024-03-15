<div id="adding-div">
    <form method="POST" action="{{route('mentor_add')}}">
        @csrf
        <div class="form-row">
            <div class="col">
                <select class="form-select" name="mentor_id" aria-label="Default select example">
                    <option selected value=null>Mentor</option>
                    @foreach($mentors as $mentor)
                        <option value="{{$mentor['id']}}">
                            {{$mentor['name']}} {{$mentor['lastname']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select name="student_ids[]" class="form-control" placeholder="Students" multiple>
                    @foreach($members as $member)
                        <option value="{{$member['id']}}">
                            {{$member['name']}} {{$member['lastname']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn-secondary btn">Add</button>
            </div>
        </div>
    </form>
</div>
