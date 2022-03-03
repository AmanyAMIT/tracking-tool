<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('tracker')}}" class="text-center">
            AMIT
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{route('ShowDiplomas')}}" class="dropdown-toggle">
                        <span class="micon dw dw-list3"></span><span class="mtext">Diplomas</span>
                    </a>
                    <li>
                        <a href="{{route('ShowStudents')}}" class="dropdown-toggle">
                            <span class="micon dw dw-group"></span><span class="mtext">Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('ShowGroups')}}" class="dropdown-toggle">
                            <span class="micon dw dw-user-11"></span><span class="mtext">Groups</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('ShowTasks')}}" class="dropdown-toggle">
                            <span class="micon dw dw-list"></span><span class="mtext">Tasks</span>
                        </a>
                    </li>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>