
	<div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{route('student')}}" class="text-center">
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
						<a href="{{route('StudentAttendance')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-meeting"></span><span class="mtext">Attendance</span>
						</a>
					</li>
					<li>
						<a href="{{route('StudentMaterial')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-attachment"></span><span class="mtext">Materials</span>
                        </a>
					</li>
					<li>
						<a href="{{route('StudentTopicsTasks')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list"></span><span class="mtext">Tasks</span>
                        </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>