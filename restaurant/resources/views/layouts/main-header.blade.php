<!-- main-header opened -->

<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/logo.png') }}"
                        class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search"> <button
                    class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">

                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            <a href="#" class="dropdown-item d-flex ">
                                <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                        src="{{ URL::asset('assets/img/flags/french_flag.jpg') }}"
                                        alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">French</span>
                                </div>
                            </a>



                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" id="search_head">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#">





                        <div class="dropdown-menu">
                            <div class="menu-header-content bg-primary text-right">

                            </div>
                            <div class="main-message-list chat-scroll">
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="  drop-img  cover-image  "
                                        data-image-src="{{ URL::asset('assets/img/faces/3.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">{{ auth()->user()->name }}</h5>
                                        </div>
                                        <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......
                                        </p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                        data-image-src="{{ URL::asset('assets/img/faces/2.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Jimmy Changa</h5>
                                        </div>
                                        <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                        data-image-src="{{ URL::asset('assets/img/faces/9.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Graham Cracker</h5>
                                        </div>
                                        <p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 25 10:35 AM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                        data-image-src="{{ URL::asset('assets/img/faces/12.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Donatella Nobatti</h5>
                                        </div>
                                        <p class="mb-0 desc">Here are some products ...</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 12 05:12 PM</p>
                                    </div>
                                </a>
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image"
                                        data-image-src="{{ URL::asset('assets/img/faces/5.jpg') }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">Anne Fibbiyon</h5>
                                        </div>
                                        <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">Jan 29 03:16 PM</p>
                                    </div>
                                </a>
                            </div>
                            <div class="text-center dropdown-footer">
                                <a href="text-center">VIEW ALL</a>
                            </div>
                        </div>
                </div>
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#" class="read_All">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>


                        <span id="notifiction3">
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class=" pulse"></span>
                            @endif
                        </span>

                    </a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                </h6>
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left"
                                    style="cursor:pointer" id="read_All">
                                    Read ALL </span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12" class="read_All"
                                id="notifiction2">
                                You have {{ auth()->user()->unreadNotifications->count() }} unread Notifications</p>
                        </div>

                        <div class="main-notification-list Notification-scroll" id="notifiction">


                            @foreach (auth()->user()->unreadNotifications as $not)
                                @if ($not->data['value'] == 0)
                                    <a class="d-flex p-3 border-bottom" href="{{ route('not_delete', $not->id) }}">
                                @endif
                                @if ($not->data['value'] == 1)
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('readNotifiction', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'evn')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_evn', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'meal')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_meal', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'section')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_section', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'c-1')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_complaint', ['notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'c-2')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_comment', ['notifiction_id' => $not->id]) }}">
                                @endif
                                @if ($not->data['value'] == 'c-3')
                                    <a class="d-flex p-3 border-bottom"
                                        href="{{ route('not_order', ['notifiction_id' => $not->id]) }}">
                                @endif



                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">{{ $not->data['msg'] }}</h5>
                                    <div class="notification-subtext">{{ $not->created_at->format('Y-m-d') }}
                                    </div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="dropdown-footer">
                            <a data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">

                                <div class="">
                                    <a class="modal-effect btn btn-outline-info btn-block"
                                        data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">View
                                        All Notifications</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ URL::asset('assets/img/faces/6.jpg') }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ URL::asset('assets/img/faces/6.jpg') }}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ auth()->user()->name }}</h6><span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ url('dashboard') }}"><i
                                class="bx bx-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href="{{ url('profile') }}"><i class="bx bx-cog"></i> Edit
                            Profile</a>
                        <a class="dropdown-item" href="{{ url('admin') }}"><i class="bx bxs-inbox"></i>Inbox</a>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bx bx-log-out"></i> Sign Out
                            </a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body" id="delete_notifiction">
                <span class="text-left">
                    <p>All : {{ auth()->user()->Notifications->count() }} </p>
                    <p>Unread : {{ auth()->user()->unreadNotifications->count() }} </p>
                    <p>Readed : {{ auth()->user()->readNotifications->count() }} </p>
                    <h6 class="text-center">All Notifications</h6>
                </span>


                @foreach (auth()->user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get() as $not)
                    @if ($not->data['value'] == 0)
                        <a class="d-flex p-3 border-bottom" href="{{ route('not_delete', $not->id) }}">
                    @endif

                    @if ($not->data['value'] == 1)
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('readNotifiction', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'evn')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_evn', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'meal')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_meal', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'section')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_section', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'c-1')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_complaint', ['notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'c-2')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_comment', ['notifiction_id' => $not->id]) }}">
                    @endif
                    @if ($not->data['value'] == 'c-3')
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('not_order', ['notifiction_id' => $not->id]) }}">
                    @endif






                    {{-- @if ($not->data['value'] == 1)
                        <a class="d-flex p-3 border-bottom"
                            href="{{ route('readNotifiction', ['product_id' => $not->data['id'], 'notifiction_id' => $not->id]) }}">
                        @elseif ($not->data['value'] == 0)
                            <a class="d-flex p-3 border-bottom" href="{{ url('notdound') }}">
                    @endif --}}

                    <div class="notifyimg bg-pink">
                        <i class="la la-file-alt text-white"></i>
                    </div>
                    <div class="mr-3">
                        <h5 class="notification-label mb-1">{{ $not->data['msg'] }}</h5>
                        <div class="notification-subtext">{{ $not->created_at->format('Y-m-d') }}
                        </div>

                    </div>
                    <div class="mr-auto">
                        @if ($not->read_at == null)
                            <li class="icons-list-item "><i class="far fa-eye-slash"></i></li>
                        @else
                            <li class="icons-list-item "><i class="far fa-eye"></i></li>
                        @endif
                    </div>
                    </a>
                @endforeach


            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-danger" type="button" id="delete_all">Delete All</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    setInterval(() => {
        $("#notifiction").load(window.location.href + " #notifiction");
        $("#notifiction2").load(window.location.href + " #notifiction2");
        $("#notifiction3").load(window.location.href + " #notifiction3");
        $("#delete_notifiction").load(window.location.href + " #delete_notifiction");
        $("#complaint_refresh").load(window.location.href + " #complaint_refresh");
        $("#order_request").load(window.location.href + " #order_request");

    }, 30000);
</script>

<!-- /main-header -->
