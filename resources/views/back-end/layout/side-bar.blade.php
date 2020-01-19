<div class="sidebar" data-color="purple" data-background-color="black" data-image="/public/assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('users')}}  ">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('categories')}}  ">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('skills')}}  ">
                <a class="nav-link" href="{{route('skills.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Skills</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('tags')}}  ">
                <a class="nav-link" href="{{route('tags.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('pages')}}  ">
                <a class="nav-link" href="{{route('pages.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>
            <li class="nav-item {{is_Active('videos')}}  ">
                <a class="nav-link" href="{{route('videos.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Videos</p>
                </a>
            </li>
        </ul>
    </div>
</div>
