<div id="adding-div">
    <form method="POST" action="{{route('member_add')}}">
        @csrf
        <div class="form-row">
            <div class="col">
                    <input name="name" type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input name="lastname" type="text" class="form-control" placeholder="Last name">
            </div>
                <select class="form-select" name='role_id' aria-label="Default select example">
                    <option disabled>Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role['id']}}">{{$role['name']}}</option>
                    @endforeach
                </select>
                <select class="form-select" name="position_id" aria-label="Default select example">
                    <option disabled>Position</option>
                    @foreach($positions as $position)
                        <option value="{{$position['id']}}">{{$position['name']}}</option>
                    @endforeach
                </select>
                <select class="form-select" name="mentor_id" aria-label="Default select example">
                    <option selected value="">Mentor</option>
                    @foreach($mentors as $mentor)
                        <option value="{{$mentor['id']}}">
                            {{$mentor['name']}} {{$mentor['lastname']}}
                        </option>
                    @endforeach
                </select>
            <div class="col">
                <input type="text" class="form-control" name="manual_busyness" placeholder="Manual Busyness">
            </div>
            <div class="col">
                <button type="submit" class="btn-secondary btn">Add</button>
            </div>
        </div>
    </form>
</div>
