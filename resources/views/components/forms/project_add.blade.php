<div id="adding-div">
    <form method="POST" action="{{route('project_add')}}">
        @csrf
        <div class="form-row">
            <div class="col">
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            <select class="form-select" name="owner_id" aria-label="Default select example">
                <option selected value=null>Member</option>
                @foreach($members as $member)
                    <option value="{{$member['id']}}">
                        {{$member['name']}} {{$member['lastname']}}
                    </option>
                @endforeach
            </select>
            <div class="col">
                <input name="rate" type="number" min="0" class="form-control" placeholder="Rate">
            </div>
            <select class="form-select" name="currency_id" aria-label="Default select example">
                <option selected value=null>Currency</option>
                @foreach($currencies as $currency)
                <option value="{{$currency['id']}}">
                    {{$currency['name']}}
                </option>
                @endforeach
                </select>
            <div class="col">
                <input type="number" min="0" name = "bid" class="form-control" placeholder="Bid">
            </div>
            <div class="col">
                <button type="submit" class="btn-secondary btn">Add</button>
            </div>
        </div>
    </form>
</div>
