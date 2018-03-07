<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')
    @yield('additional_meta')
    
    <title>@yield('title')</title>
    
    @include('layouts.css')
    @yield('additional_css')
    
</head>

<body>
@include('layouts.navbar')

@if(Session::has('flash_message'))
    <div id="flash_messages" class="alert {{session('flash_class')}} {{Session::has('flash_message_important')? 'alert-important' : ''}} flash-message-class ">

        @if(Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif

        {{session('flash_message')}}
    </div>
@endif
<div class="container container-main">
    @include('layouts.error_list')
    @yield('content')
</div>

@include('layouts.javascript')
@yield('additional_javascript')

@include('layouts.footer')

</body>

</html>