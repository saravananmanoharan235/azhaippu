<!-- {{ url('assets/img/sidebar-1.jpg') }} -->
        <div class="sidebar" data-active-color="purple" data-background-color="white" data-image="#">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    <div class="logo">
        <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
             UC 
        </a>

        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
            Uber Clone
        </a>
    </div>

    <div class="sidebar-wrapper">
        <!-- <div class="user">
            <div class="photo">
                <img src="{{ url('assets/img/faces/avatar.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                         Tania Andrew 
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <ul class="nav">

            <li class="active">
                <a href="dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#userslist">
                    <i class="material-icons">image</i>
                    <p> Riders 
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse in" id="userslist">
                    <ul class="nav">
                        <li>
                            <a href="{{url('/riders/create')}}" >
                                <span class="sidebar-mini"> A </span>
                                <span class="sidebar-normal"> Add </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/riders')}}">
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