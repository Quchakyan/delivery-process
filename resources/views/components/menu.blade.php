<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('members')}}"
                @if (Request::path() == '/')
                    style="color: black; font-size: 18px"
                @endif>
                    Members
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('projects')}}"
                @if (Request::path() == 'projects')
                   style="color: black; font-size: 18px"
                @endif>
                    Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teams')}}"
                @if (Request::path() == 'teams')
                style="color: black; font-size: 18px"
                @endif>
                    Teams
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('mentors')}}"
                @if (Request::path() == 'mentors')
                   style="color: black; font-size: 18px"
                @endif>
                    Mentors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('member-projects')}}"
                   @if (Request::path() == 'members-projects')
                       style="color: black; font-size: 18px"
                   @endif>Members/Projects</a>
            </li>
        </ul>
        <span class="navbar-text">
            Delivery Process
        </span>
    </div>
</nav>
