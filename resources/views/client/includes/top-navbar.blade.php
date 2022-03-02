
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{URL::asset('ClientPanel/src/images/product-img4.jpg')}}" alt="">
						</span>
						<span class="user-name">{{Auth::guard('client')->user()->name}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="{{route('EditProfile' , $client->id)}}"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}"  
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>