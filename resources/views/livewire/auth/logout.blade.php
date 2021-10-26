<div>
    <i class="fa fa-user me-sm-1 {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}"></i>
    <a class="d-sm-inline d-none {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}" href="{{route('logout')}}">Sign Out</a>
</div>
