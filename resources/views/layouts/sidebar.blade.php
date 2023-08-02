<script src="{{asset('js/sidebar.js')}}" type="text/javascript"></script>
<ul class="sidebar-list">
    <li class="list" onclick="simulateLinkClick(event)">
        <a href="/"><i class="bi bi-house-heart-fill"></i><span>Home</span></a>
    </li>
    <li class="list {{'users'==Request::is('users*')?'active':''}}" onclick="simulateLinkClick(event)"> 
        <a href="{{route('users.index')}}"><i class="bi bi-person"></i><span>User</span></a>
    </li>
    <li class="list {{'profiles'==Request::is('profiles*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('profiles.index')}}"><i class="bi bi-person-vcard-fill"></i><span>Profile</span></a>
    </li>
    <li class="list {{'usabilities'==Request::is('usabilities*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('usabilities.index')}}"><i class="bi bi-stack"></i> <span>Usability</span></a>
    </li>
    <li class="list {{'usabilities'==Request::is('usabilities*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('types.index')}}"><i class="bi bi-buildings"></i><span>Type</span></a>
    </li>
    <li class="list {{'files'==Request::is('files*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('files.index')}}"><i class="bi bi-file-earmark-post-fill"></i><span>File</span></a>
    </li>
    <li class="list {{'users'==Request::is('users*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('extensions.index')}}"><i class="bi bi-code-slash"></i><span>Extension</span></a>
    </li>
    <li class="list {{'profiles'==Request::is('profiles*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a href="{{route('uploads.index')}}"><i class="bi bi-cloud-arrow-up-fill"></i><span>Upload</span></a>
    </li>
</ul>