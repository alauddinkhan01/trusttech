@extends('layouts.dashboard.App')
@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Campaign Management</h3>
                        <div class="nk-block-des text-soft">
                            <p>Welcome to Campaign Management Dashboard.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em><span><span class="d-md-none">Add</span><span class="d-none d-md-block">Add Campaign</span></span></a>
                                    </li>
                                    <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 bg-primary">
                            <div class="nk-cmwg nk-cmwg1">
                                <div class="card-inner pt-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-item">
                                            <div class="text-white d-flex flex-wrap">
                                                <span class="fs-2 me-1">56.8K</span>
                                                <span class="align-self-end fs-14px pb-1"><em class="icon ni ni-arrow-long-up"></em>12.4%</span>
                                            </div>
                                            <h6 class="text-white">Running Campaign</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-sm btn-trigger on-dark" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                                    <div class="nk-cmwg1-ck">
                                        <canvas class="campaign-line-chart-s1 rounded-bottom" id="runningCampaign"></canvas>
                                    </div>
                                </div>
                            </div><!-- .nk-cmwg -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 bg-info">
                            <div class="nk-cmwg nk-cmwg1">
                                <div class="card-inner pt-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-item">
                                            <div class="text-white d-flex flex-wrap">
                                                <span class="fs-2 me-1">857.6K</span>
                                                <span class="align-self-end fs-14px pb-1"><em class="icon ni ni-arrow-long-up"></em>12.4%</span>
                                            </div>
                                            <h6 class="text-white">Total Audience</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-sm btn-trigger on-dark" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="nk-cmwg1-ck mt-auto">
                                    <canvas class="campaign-line-chart-s1 rounded-bottom" id="totalAudience"></canvas>
                                </div>
                            </div><!-- .nk-cmwg -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 bg-warning">
                            <div class="nk-cmwg nk-cmwg1">
                                <div class="card-inner pt-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-item">
                                            <div class="text-white d-flex flex-wrap">
                                                <span class="fs-2 me-1">9.3K</span>
                                                <span class="align-self-end fs-14px pb-1"><em class="icon ni ni-arrow-long-up"></em>12.4%</span>
                                            </div>
                                            <h6 class="text-white">Avg. Rating</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-sm btn-trigger on-dark" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                                    <div class="nk-cmwg1-ck">
                                        <canvas class="campaign-bar-chart-s1 rounded-bottom" id="avgRating"></canvas>
                                    </div>
                                </div>
                            </div><!-- .nk-cmwg -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 bg-danger">
                            <div class="nk-cmwg nk-cmwg1">
                                <div class="card-inner pt-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-item">
                                            <div class="text-white d-flex flex-wrap">
                                                <span class="fs-2 me-1">175.2K</span>
                                                <span class="align-self-end fs-14px pb-1"><em class="icon ni ni-arrow-long-up"></em>12.4%</span>
                                            </div>
                                            <h6 class="text-white">Subscriber</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-sm btn-trigger on-dark" data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                                    <div class="nk-cmwg1-ck">
                                        <canvas class="campaign-line-chart-s1 rounded-bottom" id="newSubscriber"></canvas>
                                    </div>
                                </div>
                            </div><!-- .nk-cmwg -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-xxl-8 col-lg-7">
                        <div class="card card-full">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Performance Overview</h6>
                                    </div>
                                    <div class="card-tools">
                                        <ul class="card-tools-nav">
                                            <li><a href="#"><span>Week</span></a></li>
                                            <li class="active"><a href="#"><span>Month</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner pt-0">
                                <ul class="d-flex justify-content-center flex-wrap gx-3 mb-2">
                                    <li class="align-center"><span class="dot" data-bg="#733AEA"></span><span class="ms-1">Social</span></li>
                                    <li class="align-center"><span class="dot" data-bg="#0FCA7A"></span><span class="ms-1">Email</span></li>
                                    <li class="align-center"><span class="dot" data-bg="#F2426E"></span><span class="ms-1">Courses</span></li>
                                    <li class="align-center"><span class="dot" data-bg="#FD9722"></span><span class="ms-1">Google Ads</span></li>
                                </ul>
                                <div class="nk-cmwg2-ck">
                                    <canvas class="campaign-line-chart-s2" id="performanceOverview"></canvas>
                                </div>
                                <div class="chart-label-group ms-5">
                                    <div class="chart-label">03 Jan</div>
                                    <div class="chart-label d-none d-sm-block">10 Jan</div>
                                    <div class="chart-label d-none d-sm-block">17 Jan</div>
                                    <div class="chart-label d-none d-sm-block">24 Jan</div>
                                    <div class="chart-label">31 Jan</div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card card-full">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Top Channels</h6>
                                    </div>
                                    <div class="card-tools">
                                        <a href="#" class="link">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner pt-0">
                                <ul class="gy-4">
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/google.png" alt=""></div>
                                            <div class="ms-2">
                                                <div class="lead-text">Google </div>
                                                <div class="sub-text">SEO & PPC</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">70%</div>
                                            <div class="progress rounded-pill w-80px">
                                                <div class="progress-bar bg-success rounded-pill" data-progress="70"></div>
                                            </div>
                                        </div>
                                    </li><!-- li -->
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/instagram.png" alt=""></div>
                                            <div class="ms-2">
                                                <div class="lead-text">Instagram </div>
                                                <div class="sub-text">Social Media</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">86%</div>
                                            <div class="progress rounded-pill w-80px">
                                                <div class="progress-bar bg-primary rounded-pill" data-progress="86"></div>
                                            </div>
                                        </div>
                                    </li><!-- li -->
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/linkedin.png" alt=""></div>
                                            <div class="ms-2">
                                                <div class="lead-text">Linked In </div>
                                                <div class="sub-text">Social Media</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">75%</div>
                                            <div class="progress rounded-pill w-80px">
                                                <div class="progress-bar bg-danger rounded-pill" data-progress="75"></div>
                                            </div>
                                        </div>
                                    </li><!-- li -->
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/slack.png" alt=""></div>
                                            <div class="ms-2">
                                                <div class="lead-text">Slack </div>
                                                <div class="sub-text">Messanger</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">64%</div>
                                            <div class="progress rounded-pill w-80px">
                                                <div class="progress-bar bg-info rounded-pill" data-progress="64"></div>
                                            </div>
                                        </div>
                                    </li><!-- li -->
                                    <li class="justify-between align-center">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/twitter.png" alt=""></div>
                                            <div class="ms-2">
                                                <div class="lead-text">Twitter </div>
                                                <div class="sub-text">Social Media</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">54%</div>
                                            <div class="progress rounded-pill w-80px">
                                                <div class="progress-bar bg-warning rounded-pill" data-progress="54"></div>
                                            </div>
                                        </div>
                                    </li><!-- li -->
                                </ul>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection




{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

