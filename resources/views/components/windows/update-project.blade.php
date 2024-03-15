<div class="window">
    <form action="{{route('project_update')}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{$project['id']}}">
        <div class="form-group">
            <label>
                Name
                <input value="{{$project['name']}}" type="text" class="form-control" name="name" placeholder="Name">
            </label>
            <label>
                Owner
                <select class="form-control" name="owner_id">
                    @foreach($members as $member)
                        <option
                            value="{{$member['id']}}"
                            @if($member['id'] === $project['owner_id'])
                                selected
                            @endif
                        >
                            {{$member['name']}} {{$member['lastname']}}
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="form-group">
                <label>
                    Rate
                    <input value="{{$project['rate']}}" type="number" class="form-control" name="rate" placeholder="Name">
                </label>
                <label>
                Currency
                <select class="form-control" name="currency_id">
                    @foreach($currencies as $currency)
                        <option
                            value="{{$currency['id']}}"
                            @if($currency['id'] === $project['currency_id'])
                                selected
                            @endif
                        >
                            {{$currency['name']}}
                        </option>
                    @endforeach
                </select>
            </label>
                <label>
                    Bid
                    <input value="{{$project['bid']}}" type="number" class="form-control" name="bid" placeholder="Name">
                </label>
            </div>
        </div>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-danger" type="button">Close</button>
        </div>
    </form>
</div>

