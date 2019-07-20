<!-- {{ url('assets/img/sidebar-1.jpg') }} -->
        <div class="sidebar" data-active-color="purple" data-background-color="white" data-image="#">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    <?php  
        //print_r(Request::segment('2')); exit;

        /*$segment = '';
        $route = Route::current();
        $actionname = $route->getActionName();

        $names = explode("@",$actionname);
        $segment = $names[1];*/
        $segment1 = Request::segment('1');
        $segment2 = Request::segment('2');
        $segment3 = Request::segment('3');
    ?>

    <div class="logo">
        <a href="{{url('/home')}}" class="simple-text logo-mini">
            A
        </a>

        <a href="{{url('/home')}}" class="simple-text logo-normal">
            {{ config('app.name', 'Azhaippu') }}
        </a>
    </div>

    <div class="sidebar-wrapper">
        
        <ul class="nav">

            <li class="{{($segment1 =='home')?'active':''}}">
                <a href="{{url('/home')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            
            <li class="{{($segment2 =='events')?'active':''}}">
                <a data-toggle="collapse" class="{{($segment2 =='events')?'':'collapsed'}}" href="#eventlist">
                    <i class="material-icons">person</i>
                    <p> Users 
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{($segment2 =='events')?'in':''}}" id="eventlist">
                    <ul class="nav">
                        <li class="{{($segment2 =='events' && $segment3 =='create')?'active':''}}">
                            <a href="{{url('/admin/events/create')}}" >
                                <span class="sidebar-mini"> A </span>
                                <span class="sidebar-normal"> Add </span>
                            </a>
                        </li>
                        <li class="{{($segment2 =='events' && $segment3 =='')?'active':''}}">
                            <a href="{{url('/admin/events')}}">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            

        </ul>


    </div>
</div>