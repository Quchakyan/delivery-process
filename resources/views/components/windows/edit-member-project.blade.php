<div class="window">
    <h3>
        {{$data['name']}} {{$data['lastname']}}
    </h3>
    <form>
        @csrf
        <div class="form-group">
            <label>
                <input type="hidden" name="member_id" value="{{$data['id']}}">
            </label>
        </div>
        <div class="form-group">
        @if(count($data['projects']))
            @for($i = 0; $i<count($data['projects']); $i++)
                <div>
                    <label>
                        Project
                        <select name="project_ids[]" class="form-select">
                            @foreach($projects as $project)
                                <option
                                    value="{{$project['id']}}"
                                    @if($project['id'] === $data['projects'][$i]['id'])
                                        selected
                                    @endif
                                >{{$project['name']}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label>
                        Role in project
                        <input type="text" name="role_in_project[]" value="{{$data['projectStats'][$i]['role_in_project']}}">
                    </label>
                        Is official
                    <label>
                        <input type="checkbox"
                               name="is_official[]"
                                @if($data['projectStats'][$i]['is_official'])
                                    checked
                                @endif
                        >
                    </label>
                     |
                    <label>
                        Delete from project
                        <input type="checkbox" name="deleteFromProject[]">
                    </label>
                </div>
            @endfor
        @endif
            <div id="project-list"></div>
            <button type="button" class="btn btn-success" onclick="projectAdding({{json_encode($projects)}})">Add to project </button>
        </div>
        <hr>
        <div class="edit-btn-cont">
            <button class="btn btn-primary" type="button" onclick="getData({{$data['id']}})">Save</button>
            <button class="btn btn-danger" type="button">Close</button>
        </div>
    </form>
</div>
