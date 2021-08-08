<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
							<li class="{{active_link('owner/dashboard')}}">
								<a href="{{route('owner.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>

                            <li class="{{active_link('owner/house*')}}">
								<a href="{{route('house.index')}}"><i class="fe fe-building"></i> <span>Houses</span></a>
							</li>
							<li class="{{active_link('owner/group')}}">
								<a href="{{route('group.index')}}"><i class="fe fe-tiled"></i> <span>Groups</span></a>
							</li>
								</li>
							<li class="{{active_link('owner/meeting')}}">
								<a href="{{route('owner.meeting')}}"><i class="fe fe-desktop"></i> <span>Mettings</span></a>
							</li>
                            <li class="{{active_link('owner/calendar*')}}">
								<a href="{{route('calendar.create')}}"><i class="fe fe-calendar"></i> <span>Calendar</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>

