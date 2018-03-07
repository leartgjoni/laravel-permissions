<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/welcome')}}">Laravel</a>
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::user()->isAdmin())
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="{{url('role')}}">Roles</a></li>
                <li><a href="{{url('user')}}">Users</a></li>
                </ul>
                </li>
                @endif
                @if(Auth::user()->hasAccess('pacient.index'))
                <li class=""><a href="{{route('pacient.index')}}">Patients</a></li>
                @endif
                @if(Auth::user()->hasAccess('category.index'))
                <li><a href="{{url('category')}}">Categories</a></li>
                @endif
                @if(Auth::user()->hasAccess('service.index'))
                <li class=""><a href="{{route('service.index')}}">Services</a></li>
                @endif
                @if(Auth::user()->hasAccess('bill.index'))
                <li class=""><a href="{{route('bill.index')}}">Invoices</a></li>
                @endif
                @if(Auth::user()->hasAccess('folder.index'))
                <li class=""><a href="{{route('folder.index')}}">Files</a></li>
                @endif
            </ul>
        
    
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="{{url('logout')}}">Logout</a></li>
                </ul>
                </li>
            </ul>
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>