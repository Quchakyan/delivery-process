let addingDiv = document.getElementById('adding-div');

function toggleAddingDiv(){
    addingDiv.style.display === 'block'
        ? addingDiv.style.display = 'none'
        : addingDiv.style.display = 'block'
}

function projectAdding(projects) {
    let projectList = document.getElementById('project-list');
    projectAddForm(projectList, projects)
}

function projectAddForm(htmlElement, projects) {
    let randDivId = "div_id_" + Math.random() + new Date().getMilliseconds();
    let randSelectId = "select_id_" + Math.random() + new Date().getMilliseconds();

    htmlElement.innerHTML += "  <div id="+randDivId+">\n" +
        "                    <label>\n" +
        "                        Project\n" +
        "                        <select id="+randSelectId+" name=\"project_ids[]\" class=\"form-select\">\n" +
        "                        </select>\n" +
        "                    </label>\n" +
        "                    <label>\n" +
        "                        Role in project\n" +
        "                        <input type=\"text\" name=\"role_in_project[]\" >\n" +
        "                    </label>\n" +
        "                        Is official\n" +
        "                    <label>\n" +
        "                        <input type=\"checkbox\"\n" +
        "                               name=\"is_official[]\"\n" +
        "                        >\n" +
        "                    </label>\n" +
        "                    | <button type=\"button\" class=\"close\" aria-label=\"Close\" onclick=\'removeAddForm(\""+randDivId+"\")\' >" +
        "                           <span aria-hidden=\"true\">&times;</span> \n" +
        "                      </button> \n" +
        "                </div>";

    let select = document.getElementById(randSelectId);
    createSelect(select, projects);
}

function createSelect(htmlElement, projects) {
    for (let i = 0; i < projects.length; i++) {
        htmlElement.innerHTML += "<option value="+ projects[i]['id'] +">"+projects[i]['name']+"</option>"
    }
}

function removeAddForm(htmlElement) {
    document.getElementById(htmlElement).remove();
}

function getData(id) {

    let json = {
        user_id : id,
        params : []
    };

    let projectIds = document.getElementsByName('project_ids[]');
    let roleInProjects = document.getElementsByName('role_in_project[]');
    let isOfficials = document.getElementsByName('is_official[]');
    let deleteFromProject = document.getElementsByName('deleteFromProject[]');

    for (let num = 0; num < projectIds.length; num++) {
        json.params.push({
            "project_id" : projectIds[num].value,
            "role_in_project" : roleInProjects[num].value,
            "is_official" : isOfficials[num].checked,
            "delete" : deleteFromProject[num] ? deleteFromProject[num].checked : false
        })
    }

    sendMemberProjectRequest(json);
}

function sendMemberProjectRequest(json) {
    let url = 'http://localhost:8000/api/member-projects';
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(json)
    }).then(() => location.reload())
        .catch(e => console.log(e));
}

function deleteWindows() {
    let windows = document.querySelectorAll('.window');
    windows.forEach(el => el.remove());
}

function createComponent(member, projects) {
    deleteWindows();

    let parent = document.createElement('div');
    parent.classList.add('window');

    let h3 = document.createElement('h3');
    h3.innerHTML = member['name'] + " " + member['lastname'];

    let hr = document.createElement('hr');

    parent.appendChild(h3);
    parent.append(hr);

    let div1 = document.createElement('div');
    div1.classList.add('form-group');

    let label1 = document.createElement('label');

    let idInput = document.createElement('input');
    idInput.setAttribute('type', 'hidden');
    idInput.setAttribute('name', 'member_id');
    idInput.setAttribute('value', member['id']);

    label1.appendChild(idInput);

    div1.appendChild(label1);

    parent.appendChild(div1);

    let div2 = document.createElement('div');
    div2.classList.add('form-group');


    if (member['projects'].length) {
        let div = document.createElement('div');
        div.classList.add('form-group');

        for (let i = 0; i < member['projects'].length; i++) {

            let label1 = document.createElement('label');

            let spanProject = document.createElement('span');
            spanProject.innerHTML = "Project";

            let projectSelect = document.createElement('select');
            projectSelect.setAttribute('name', 'project_ids[]');
            projectSelect.setAttribute('class', 'form-select');

            projects.forEach(item => {
                let option = document.createElement('option');
                option.setAttribute('value', item['id']);
                if (item['id'] === member['projects'][i]['id']) {
                    option.setAttribute("selected", "selected");
                }
                option.innerHTML = item['name'];

                projectSelect.appendChild(option);
            });

            label1.appendChild(spanProject);
            label1.appendChild(projectSelect);

            let label2 = document.createElement('label');

            let roleSpan = document.createElement('span');
            roleSpan.innerHTML = "Role in project";

            let roleInput = document.createElement('input');
            roleInput.setAttribute('type', 'text');
            roleInput.setAttribute('name', 'role_in_project[]');
            roleInput.setAttribute('value', member['project_stats'][i]['role_in_project']);

            label2.appendChild(roleSpan);
            label2.appendChild(roleInput);

            let label3 = document.createElement('label');

            let isOfficialSpan = document.createElement('span');
            isOfficialSpan.innerHTML = "Is official";

            let isOfficialInput = document.createElement('input');
            isOfficialInput.setAttribute('type', 'checkbox');
            isOfficialInput.setAttribute('name', 'is_official[]');
            if(member['project_stats'][i]['is_official']) {
                isOfficialInput.setAttribute('checked', 'checked');
            }

            label3.appendChild(isOfficialSpan);
            label3.appendChild(isOfficialInput);

            let label4 = document.createElement('label');

            let deleteSpan = document.createElement('span');
            deleteSpan.innerHTML = "| Remove member from project";

            let deleteInput = document.createElement('input');
            deleteInput.setAttribute('type', 'checkbox');
            deleteInput.setAttribute('name', 'deleteFromProject[]');

            label4.appendChild(deleteSpan);
            label4.appendChild(deleteInput);

            div.appendChild(label1);
            div.appendChild(label2);
            div.appendChild(label3);
            div.appendChild(label4);
        }
        div2.appendChild(div);
    }

    parent.appendChild(div2);

    let div3 = document.createElement('div');
    div3.setAttribute('id', 'project-list');

    parent.appendChild(div3);

    let addBtn = document.createElement('button');
    addBtn.classList.add('btn', 'btn-success');
    addBtn.setAttribute('type', 'button');
    addBtn.addEventListener('click', () => projectAdding(projects));
    addBtn.innerHTML = "Add to new project";

    parent.appendChild(addBtn);
    parent.append(hr);

    let btnDiv = document.createElement('div');
    btnDiv.classList.add('edit-btn-cont');

    let saveBtn = document.createElement('button');
    saveBtn.classList.add('btn', 'btn-primary');
    saveBtn.setAttribute('type', 'button');
    saveBtn.addEventListener('click', () => getData(member['id']));
    saveBtn.innerHTML = "Save";

    let closeBtn = document.createElement('button');
    closeBtn.classList.add('btn', 'btn-danger');
    closeBtn.setAttribute('type', 'button');
    closeBtn.innerHTML = "Close";
    closeBtn.addEventListener('click', () => parent.remove());

    document.addEventListener('keydown', (e) => {
        switch (e.key){
            case "Escape" :
                parent.remove();
                break;
            case "Enter" :
                getData(member['id']);
                break;
        }
    })

    btnDiv.appendChild(saveBtn);
    btnDiv.appendChild(closeBtn);

    parent.appendChild(btnDiv);

    document.body.appendChild(parent);
}

function createMemberWindow(roles, positions, mentors, member) {
    deleteWindows();

    let div = document.createElement('div');
    div.setAttribute('class', 'window');

    div.innerHTML = `
            <form action=\"http://localhost:8000/api/member/update\" method=\"POST\">
                <input type=\"hidden\" name=\"id\" value="${member['id']}">
                <div class=\"form-group\">
                    <label>Name
                        <input
                            value=\"${member['name']}\"
                            type=\"text\"
                            class=\"form-control\"
                            name=\"name\"
                            placeholder=\"Name\">
                    </label>
                    <label>Lastname
                        <input
                            value=\"${member['lastname']}\"
                            name=\"lastname\"
                            type=\"text\"
                            class=\"form-control\"
                            placeholder=\"Lastname\">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        Position
                        <select id="position-select" class=\"form-control\" name=\"position_id\">
                        </select>
                    </label>
                    <label>Role
                        <select id="role-select" class=\"form-control\" name=\"role_id\">
                       </select>
                    </label>
                    <label>
                        Mentor
                        <select class=\"form-control\" name=\"mentor_id\" id="mentor-select">
                         <option value="">Mentor</option>
                        </select>
                    </label>
                </div>
                <div class=\"form-group\">
                    <label>
                        Manual Busyness
                        <input value="${member['manual_busyness']}" type="text" class="form-control" name="manual_busyness" placeholder="Manual Busyness">
                    </label>\
                </div>\
               <div class=\"edit-btn-cont\">
                    <button class=\"btn btn-primary\">Save</button>
                   <button id="close-btn" class=\"btn btn-danger\" type=\"button\">Close</button>
                </div>
            </form>
        `;

    document.body.append(div);

    let posSelect = document.getElementById('position-select');
    let rolSelect = document.getElementById('role-select');
    let menSelect = document.getElementById('mentor-select');

    positions.forEach(item => {
        let option = document.createElement('option');
        option.setAttribute('value', item['id']);
        member['position_id'] === item['id'] && option.setAttribute('selected', 'selected');
        option.innerHTML = item['name'];

        posSelect.append(option);
    });

    roles.forEach(item => {
        let option = document.createElement('option');
        option.setAttribute('value', item['id']);
        member['role_id'] === item['id'] && option.setAttribute('selected', 'selected');
        option.innerHTML = item['name'];

        rolSelect.append(option);
    })

    mentors.forEach(item => {
        ////// jnjel henc iran
        if(item['id'] !== member['id']){
            let option = document.createElement('option');
            option.setAttribute('value', item['id']);
            member['mentor_id'] === item['id'] && option.setAttribute('selected', 'selected');
            option.innerHTML = item['name'];

            menSelect.append(option);
        }
    })

    let closeBtn = document.getElementById('close-btn');
    closeBtn.addEventListener('click', () => div.remove());

    document.addEventListener('keydown', (e) => {
        e.key === "Escape" && div.remove();
    })
}

function createProjectWindow(project, members, currencies) {
    deleteWindows();

    let div = document.createElement('div');
    div.setAttribute('class', 'window');

    div.innerHTML = `
    <form action="http://localhost:8000/api/project/update" method="POST">
        <input type="hidden" name="id" value="${project['id']}">
        <div class="form-group">
            <label>
                Name
                <input value="${project['name']}" type="text" class="form-control" name="name" placeholder="Name">
            </label>
            <label>
                Owner
                <select id="proj-owner-select" class="form-control" name="owner_id">
                </select>
            </label>
            <div class="form-group">
                <label>
                    Rate
                    <input value="${project['rate']}" type="number" class="form-control" name="rate" placeholder="Rate">
                </label>
                <label>
                Currency
                <select id="proj-currency-select" class="form-control" name="currency_id">
                </select>
            </label>
                <label>
                    Bid
                    <input value="${project['bid']}" type="number" class="form-control" name="bid" placeholder="Bid">
                </label>
            </div>
        </div>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button id="close-btn" class="btn btn-danger" type="button">Close</button>
        </div>
    </form>`

    document.body.appendChild(div);

    let projOwnerSelect = document.getElementById('proj-owner-select');

    members.forEach(item => {
        let option = document.createElement('option');
        option.setAttribute('value', item['id']);
        option.innerHTML = item['name'] +" "+item['lastname'];
        if(item['id'] === project['owner_id']) {
            option.setAttribute('selected', 'selected');
        }
        projOwnerSelect.append(option)
    });

    let projCurrencySelect = document.getElementById('proj-currency-select');

    currencies.forEach(item => {
        let option = document.createElement('option');
        option.setAttribute('value', item['id']);
        option.innerHTML = item['name'];
        if(item['id'] === project['currency_id']) {
            option.setAttribute('selected', 'selected');
        }
        projCurrencySelect.append(option)
    });

    let closeBtn = document.getElementById('close-btn');
    closeBtn.addEventListener('click', () => div.remove());

    document.addEventListener('keydown', (e) => {
        e.key === "Escape" && div.remove();
    });
}

function createTeamWindow(teamleads, members, team){
    deleteWindows();

    let div = document.createElement('div');
    div.setAttribute('class', 'window');

    div.innerHTML = `
    <form action="http://localhost:8000/api/team/operate" method="POST">
        <input type="hidden" name="team_id" value="${team['id']}">
        <div class="form-group">
            <label>
                Name
                <input value="${team['name']}" type="text" class="form-control" name="name" placeholder="Name">
            </label>
            <label>
                Owner
                <select id="select-owner" class="form-control" name="owner_id">
                </select>
            </label>
        </div>
        <div class="form-group">
                Select Teammates
                <hr>
                <div id="members-select"></div>
        </div>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button id="close-btn" class="btn btn-danger" type="button">Close</button>
        </div>
    </form>`

    document.body.appendChild(div);

    let ownerSelect = document.getElementById('select-owner');

    teamleads.forEach(item => {
       let option = document.createElement('option');
       option.setAttribute('value', item['id']);
       item['id'] === team['owner_id'] && option.setAttribute('selected', 'selected');
       option.innerHTML = `${item['name']} ${item['lastname']}`;

       ownerSelect.appendChild(option);
    });

    let teammateIds = team['teammates'].map(item => item.id);

    let membersSelect = document.getElementById('members-select');

    members.forEach(item => {
        if (item['id'] !== team['owner_id']) {
            let cont = document.createElement('div');
            cont.classList.add('form-check');

            let label = document.createElement('label');
            label.classList.add('form-check-label');

            let input = document.createElement('input');
            input.setAttribute('type', 'checkbox');
            input.setAttribute('name', 'teammate_ids[]');
            input.setAttribute('value', item['id']);
            if(teammateIds.includes(item['id'])) {
                input.setAttribute('checked', 'checked');
            }

            input.classList.add('form-check-input');

            let text = document.createElement('span');
            text.innerHTML = `${item['name']} ${item['lastname']}`;

            label.append(input, text);

            cont.append(label);

            membersSelect.append(cont);
        }
    });

    let closeBtn = document.getElementById('close-btn');
    closeBtn.addEventListener('click', () => div.remove());

    document.addEventListener('keydown', (e) => {
        e.key === "Escape" && div.remove();
    });
}

function createMentorWindow(members, mentor) {
    deleteWindows();

    let div = document.createElement('div');
    div.setAttribute('class', 'window');

    div.innerHTML = `
        <form action="http://localhost:8000/api/mentor/operate" method="POST">
        <div class="form-group">
            <label>
                Mentor: ${mentor['name']} ${mentor['lastname']}
                <input type="hidden" name="mentor_id" value="${mentor['id']}">
            </label>
        </div>
            <label>
                Students
                <hr>
                <div id="students-select"></div>
            </label>
        <div class="edit-btn-cont">
            <button class="btn btn-primary">Save</button>
            <button id="close-btn" class="btn btn-danger" type="button">Close</button>
        </div>
    </form>`

    document.body.appendChild(div);

    let studentsSelect = document.getElementById('students-select');

    members.forEach(item => {
        if (item['id'] !== mentor['id']) {
            let cont = document.createElement('div');
            cont.classList.add('form-check');

            let label = document.createElement('label');
            label.classList.add('form-check-label');

            let input = document.createElement('input');
            input.setAttribute('type', 'checkbox');
            input.setAttribute('name', 'student_ids[]');
            input.setAttribute('value', item['id']);
            if (item['mentor_id'] === mentor['id']) {
                input.setAttribute('checked','checked');
            }

            input.classList.add('form-check-input');

            let text = document.createElement('span');
            text.innerHTML = `${item['name']} ${item['lastname']}`;

            label.append(input, text);

            cont.append(label);

            studentsSelect.append(cont);
        }
    });

    let closeBtn = document.getElementById('close-btn');
    closeBtn.addEventListener('click', () => div.remove());

    document.addEventListener('keydown', (e) => {
        e.key === "Escape" && div.remove();
    });
}

function alertDeleteWindow(routeName, id) {
    deleteWindows();

    let div = document.createElement('div');
    div.classList.add('window');

    div.innerHTML = `
    <form id="deleting-form" action="http://localhost:8000/api/${routeName}/${id}/delete" method="POST">
        <h3>Are you sure?   </h3>
        <div class="btn-flex">
            <button class="btn btn-danger">Save</button>
            <button id="cls-btn" class="btn btn-secondary" type="button">Close</button>
        </div>
    </form>
    `

    document.body.append(div);

    let clsBtn = document.getElementById('cls-btn');
    clsBtn.addEventListener('click', () => div.remove());

    let form = document.getElementById('deleting-form');

    document.addEventListener('keydown',(e) => {
        switch (e.key){
            case "Escape" :
                div.remove();
                break;
            case "Enter" :
                form.submit();
                break;
        }
    });
}
