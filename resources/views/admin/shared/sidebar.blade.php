<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="nav-item start active"> <a href="{{ route('admin.home') }}" class="nav-link"> <i
                    class="icon-home"></i> <span class="title">Dashboard</span> </a> </li>
        @include('admin/shared/side_bars/admin_user')


        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">our statistics </span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('admin.stCreate') }}" class="nav-link">
                        <i class="icon-list"></i>
                        <span class="title">Statistics Add</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{ route('admin.stIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">Statistics List</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item start">
            <a href="{{ route('admin.jsIndex') }}" class="nav-link">
                <i class="fa fa-graduation-cap"></i>
                <span class="title">Job Service</span>
            </a>
        </li>

        <li class="nav-item start">
            <a href="{{ route('admin.contactDetailsIndex') }}" class="nav-link">
                <i class="fa fa-graduation-cap"></i>
                <span class="title">Contact Form</span>
            </a>
        </li>


        <li class="nav-item start">
            <a href="{{ route('admin.successIndex') }}" class="nav-link">
                <i class="icon-user"></i>
                <span class="title">Success Job</span>
            </a>
        </li>


        <li class="nav-item start">
            <a href="{{ route('admin.caseIndex') }}" class="nav-link">
                <i class="fa fa-bar-chart"></i>
                <span class="title">Case study</span>
            </a>
        </li>


        <li class="nav-item start">
            <a href="{{ route('admin.fiIndex') }}" class="nav-link">
                <i class="fa fa-line-chart"></i>
                <span class="title">Featured Institute</span>
            </a>
        </li>


<!-- 
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">Merit</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('admin.meritIndex') }}" class="nav-link">
                        <i class="icon-list"></i>
                        <span class="title">Merit</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{ route('admin.meritDetailsIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">Merit Details</span>
                    </a>
                </li>
            </ul>
        </li> -->

       


        <li class="nav-item start">
            <a href="{{ route('admin.faqcIndex') }}" class="nav-link">
                <i class="fa fa-line-chart"></i>
                <span class="title">FAQs Category</span>
            </a>
        </li>

        <li class="nav-item start">
            <a href="{{ route('blog') }}" class="nav-link">
                <i class="fa fa-line-chart"></i>
                <span class="title">Blog </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">About Us</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('admin.aboutIndex') }}" class="nav-link">
                        <i class="icon-list"></i>
                        <span class="title">About</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{ route('admin.aboutDetailsIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">About Details</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item start">
            <a href="{{ route('admin.growthIndex') }}" class="nav-link">
                <i class="fa fa-line-chart"></i>
                <span class="title">Company Growth</span>
            </a>
        </li>




       
       
        <li class="heading">
            <h3 class="uppercase">Job Search</h3>
        </li>
       


        <li class="heading">
            <h3 class="uppercase">Modules</h3>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">Job Category Manage</span> <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('admin.jcIndex') }}" class="nav-link">
                        <i class="icon-list"></i>
                        <span class="title">Category</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('admin.jscIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">Sub Category</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('admin.jiIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">Industry</span>
                    </a>
                </li>
                {{-- <li class="nav-item  ">
                    <a href="{{ route('admin.jpIndex') }}" class="nav-link ">
                        <i class="icon-list"> </i>
                        <span class="title">Place</span>
                    </a>
                </li> --}}
            </ul>
        </li>
        @include('admin/shared/side_bars/job')
        @include('admin/shared/side_bars/company')
        @include('admin/shared/side_bars/site_user')
        @include('admin/shared/side_bars/cms')
        @include('admin/shared/side_bars/blogs')
        @include('admin/shared/side_bars/seo')
        @include('admin/shared/side_bars/faq')
        @include('admin/shared/side_bars/video')
        @include('admin/shared/side_bars/testimonial')
        @include('admin/shared/side_bars/slider')


        @if (APAuthHelp::check(['SUP_ADM']))
            <li class="heading">
                <h3 class="uppercase">Translation</h3>
            </li>
            @include('admin/shared/side_bars/language')

        
            <li class="heading">
                <h3 class="uppercase">Driving Certificate</h3>
            </li>
            @include('admin/shared/side_bars/driving_class')
            <li class="heading">
                <h3 class="uppercase">Manage Location</h3>
            </li>
            @include('admin/shared/side_bars/country')
            @include('admin/shared/side_bars/country_detail')
            @include('admin/shared/side_bars/state')
            @include('admin/shared/side_bars/city')


            <li class="heading">
                <h3 class="uppercase">User Packages</h3>
            </li>
            @include('admin/shared/side_bars/package')



            <li class="heading">
                <h3 class="uppercase">Job Attributes</h3>
            </li>
            @include('admin/shared/side_bars/language_type')
            @include('admin/shared/side_bars/language_level')
            @include('admin/shared/side_bars/career_level')
            @include('admin/shared/side_bars/functional_area')
            @include('admin/shared/side_bars/gender')
            @include('admin/shared/side_bars/industry')
            @include('admin/shared/side_bars/job_experience')
            @include('admin/shared/side_bars/job_skill')
            @include('admin/shared/side_bars/job_type')
            @include('admin/shared/side_bars/job_shift')
            @include('admin/shared/side_bars/degree_level')
            @include('admin/shared/side_bars/degree_type')
            @include('admin/shared/side_bars/major_subject')
            @include('admin/shared/side_bars/result_type')
            @include('admin/shared/side_bars/marital_status')
            @include('admin/shared/side_bars/ownership_type')
            @include('admin/shared/side_bars/salary_period')

            <li class="heading">
                <h3 class="uppercase">Manage</h3>
            </li>
            @include('admin/shared/side_bars/site_setting')
        @endif



    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
