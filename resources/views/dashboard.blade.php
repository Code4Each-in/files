@extends('layout')

@section('content')

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src">
                <img src="assets/image/black-logo.png">
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <!-- <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div> -->
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left ml-3 header-user-info">
                                <div class="widget-heading">
                                    @if(Auth::check())
                                    <p>Welcome {{ Auth::user()->name }} !</p>
                                    @endif
                                </div>
                                <!-- <div class="widget-subheading">
                                        VP People Manager
                                    </div> -->
                            </div>
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="assets/image/1.jpg" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute;transform: translate3d(-145px, 50px, 0px);top: 0px;left: 0px;will-change: transform;">
                                        <button type="button" tabindex="0" class="dropdown-item">User
                                            Account</button>
                                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                        <!-- <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item">Dividers</button> -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui-theme-settings settings-open">
        <button type="button" class="btn-open-options btn btn-danger text-white">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>

    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar ps">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu metismenu">
                        <!-- <li class="app-sidebar__heading">Dashboards</li> -->
                        <li>
                            <a href="{{ route('dashboard') }}" class="mm-active">
                                <i class="fa fa-tachometer "></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- <li>
                                <a href="forms-validation.html">
                                    <i class="fa fa-users ">
                                    </i> <span>Users </span>
                                </a>
                            </li> -->
                    </ul>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <!-- <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fa fa-tachometer">
                                    </i>
                                </div>
                                <div>Analytics Dashboard
                                    <div class="page-title-subheading">This is an example dashboard created using
                                        build-in elements and components.
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <div class="file-listing">
                        @if(!empty($userFiles))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">File Type</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">File Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp <!-- Initialized counter outside of the loop -->
                                @foreach($userFiles as $row)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th> <!-- No semicolon -->
                                    <td>{{ $row['file_type'] }}</td> <!-- No semicolon -->
                                    <td>{{ $row['title'] }}</td> <!-- No semicolon -->
                                    <td>{{ $row['message'] }}</td> <!-- No semicolon -->
                                    <td>
                                        <button class="btn btn-info" data-link="{{ $row['file_link'] }}" onclick="copyToClipboard(this)">Copy Link</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary dlt-btn" data-rowId="{{ $row['id'] }}">Delete</button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>@
                        @else
                        <p>No files found.</p> <!-- If there are no files -->
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js_scripts')
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('.dlt-btn').on('click', function(e) {
            e.preventDefault();
            var rowid = $(this).data('rowId');
            $.ajax({
                url: "{{ route('delete_file_link') }}",
                type: 'delete',
                data: {
                    'rowId': rowid
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error :' + error);
                }
            })
        })
    })

    function copyToClipboard(button) {
        // Get the link from the button's data-link attribute
        var link = button.getAttribute('data-link');

        // Create a temporary text area element
        var tempInput = document.createElement("textarea");
        tempInput.value = link;
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text area
        document.execCommand("copy");

        // Remove the temporary text area element
        document.body.removeChild(tempInput);

        // Show a confirmation alert or message
        // alert("Link copied to clipboard: " + link);
    }
</script>
@endsection