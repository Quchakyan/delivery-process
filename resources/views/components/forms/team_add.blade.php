<div id="adding-div">
    <form method="POST" action="{{route('team_add')}}">
        @csrf
        <div class="form-row">
            <div class="col">
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            <select class="form-select" name="owner_id" aria-label="Default select example">
                <option selected value=null>Teamlead</option>
                @foreach($teamleads as $teamlead)
                    <option value="{{$teamlead['id']}}">
                        {{$teamlead['name']}} {{$teamlead['lastname']}}
                    </option>
                @endforeach
            </select>
            <div class="col">
                <button type="submit" class="btn-secondary btn">Add</button>
            </div>
        </div>
    </form>
</div>
