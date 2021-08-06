<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
							<li class="{{active_link('admin/dashboard')}}">
								<a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> All Rental Owner </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{active_link('admin/owner/create')}}" href="{{route('owner.create')}}"> <i class="fa fa-plus mr-2"></i> Add Rental Owner </a></li>
									<li><a class="{{active_link('admin/owner')}}" href="{{route('owner.index')}}"> <i class="fa fa-th-list mr-2"></i> List Rental Owner </a></li>

								</ul>
							</li>
							<li class="submenu ">
								<a href=""><i class="fe fe-document"></i> <span> All Houses </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{active_link('admin/house/create')}}" href="{{route('house.create')}}"> <i class="fa fa-plus mr-2"></i> Add House </a></li>
									<li><a class="{{active_link('admin/house')}}" href="{{route('house.index')}}"> <i class="fa fa-th-list mr-2"></i> List Houses </a></li>

								</ul>
							</li>
							<!-- <li class="submenu ">
								<a href=""><i class="fe fe-document"></i> <span> All Applications </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{active_link('admin/application/create')}}" href="{{route('application.create')}}"> <i class="fa fa-plus mr-2"></i> Add House </a></li>
									<li><a class="{{active_link('admin/application')}}" href="{{route('application.index')}}"> <i class="fa fa-th-list mr-2"></i> List Applications </a></li>

								</ul>
							</li> -->

							<li class=" {{active_link('admin/application')}}">
								<a href="{{route('application.index')}}"><i class="fe fe-home"></i> <span>All Applications</span></a>
							</li>

							<li class=" {{active_link('admin/interview')}}">
								<a href="{{route('interview.index')}}"><i class="fe fe-home"></i> <span>All Interviews</span></a>
							</li>

                            <li class="{{active_link('admin/group')}}">
								<a href="{{route('group.index')}}"><i class="fe fe-home"></i> <span>Groups</span></a>
							</li>

							<!--
							<li class="">
								<a href="{{url('all-rental-owners')}}"><i class="fe fe-home"></i> <span>All Rental Owners</span></a>
							</li>
							<li class="">
								<a href="{{url('all-rooms')}}"><i class="fe fe-home"></i> <span>All Rooms</span></a>
							</li> -->


						</ul>
					</div>
                </div>
            </div>
