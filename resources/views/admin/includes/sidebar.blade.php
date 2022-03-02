
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('dashboard')}}" class="text-center">
            AMIT
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-list"></span><span class="mtext">Tasks</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('tasks.index')}}">All Tasks</a></li>
                        <li><a href="{{route('tasks.create')}}">Add Task</a></li>
                        <li><a href="{{route('solvedTasks.index')}}">Solved Tasks</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-diagram"></span><span class="mtext">Categories</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('taskcategories.index')}}">All Categories</a></li>
                        <li><a href="{{route('taskcategories.create')}}">Add Category</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-group"></span><span class="mtext">Students</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('students.index')}}">All Students</a></li>
                        <li><a href="{{route('students.create')}}">Add Student</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext">Clients</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('clients.index')}}">All Clients</a></li>
                        <li><a href="{{route('clients.create')}}">Add Client</a></li>
                        <li><a href="{{route('StoreClientDiploma')}}">Assign to Diploma</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user-11"></span><span class="mtext">Groups</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('groups.index')}}">All Groups</a></li>
                        <li><a href="{{route('groups.create')}}">Add Group</a></li>
                        {{-- <li><a href="{{route('rounds.create')}}">Add Round</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-copy"></span><span class="mtext">Diplomas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('diplomas.index')}}">All Diplomas</a></li>
                        <li><a href="{{route('diplomas.create')}}">Add Diploma</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="micon dw dw-meeting"></i><span class="mtext">Sessions</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('sessions.index')}}">All Sessions</a></li>
                        <li><a href="{{route('sessions.create')}}">Create Seesion</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-attachment"></span><span class="mtext">Materials</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('materials.index')}}">All Materials</a></li>
                        <li><a href="{{route('materials.create')}}">Add Materials</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>