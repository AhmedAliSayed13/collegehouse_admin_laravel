<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="{{active_link('tenant/dashboard')}}"> 
								<a href="{{route('tenant.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<!-- <li class="submenu ">
								<a href=""><i class="fe fe-document"></i> <span> All Groups</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{active_link('tenant/group/create')}}" href="{{route('tenant.create-group')}}"> <i class="fa fa-plus mr-2"></i> Create Group </a></li>
									<li><a class="{{active_link('tenant/group')}}" href="{{route('application.index')}}"> <i class="fa fa-th-list mr-2"></i> List Groups </a></li>
									{{-- <li><a class="{{active_link('tenant/zailcode')}}" href="{{url('/tenant/showzailcode')}}"> <i class="fa fa-th-list mr-2"></i> Add Zail code </a></li> --}}
									
								</ul>
							</li> -->
							<li class="{{active_link('group/list')}}"> 
								<a href="{{route('tenant.list-group')}}"><i class="fe fe-home"></i> <span>List Group</span></a>
							</li>
							<li class="{{active_link('step1')}}"> 
								<a href="{{route('step1')}}"><i class="fe fe-home"></i> <span>Add Application</span></a>
							</li>
							<li class="submenu ">
								<a href=""><i class="fe fe-document"></i> <span> Applications</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{active_link('tenant/applications/')}}" href="{{route('tenant.showapplications')}}"> <i class="fa fa-plus mr-2"></i> All Applications </a></li>
								</ul>
							</li>
							

						</ul>
					</div>
                </div>
            </div>