@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-users font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if ($user_count >= 1000 and $user_count < 1000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($user_count/1000) }}</span>K</h3>
                            @elseif ($user_count >= 1000000 and $user_count < 1000000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($user_count/1000000) }}</span>M</h3>
                            @elseif ($user_count >= 1000000000 and $user_count < 1000000000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($user_count/1000000000) }}</span>G</h3>
                            @elseif ($user_count >= 1000000000000 and $user_count < 1000000000000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($user_count/1000000000000) }}</span>T</h3>
                            @else
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($user_count) }}</span></h3>
                            @endif
                            <p class="text-muted mb-1 text-truncate">@lang('dashboard.total number of users')</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-settings font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if ($policyCount >= 1000 and $policyCount < 1000000)
                                <h3 class="text-dark mt-1">$ <span data-plugin="counterup">{{ number_format($policyCount/1000, 2) }}</span>K</h3>
                            @elseif ($policyCount >= 1000000 and $policyCount < 1000000000)
                                <h3 class="text-dark mt-1">$ <span data-plugin="counterup">{{ number_format($policyCount/1000000, 2) }}</span>M</h3>
                            @elseif ($policyCount >= 1000000000 and $policyCount < 1000000000000)
                                <h3 class="text-dark mt-1">$ <span data-plugin="counterup">{{ number_format($policyCount/1000000000, 2) }}</span>G</h3>
                            @else
                                <h3 class="text-dark mt-1">$ <span data-plugin="counterup">{{ number_format($policyCount, 2) }}</span></h3>
                            @endif
                            <p class="text-muted mb-1 text-truncate">@lang('dashboard.total sum of policies')</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-shopping-cart font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if ($escenaryCount >= 1000 and $escenaryCount < 1000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($escenaryCount/1000) }}</span>K</h3>
                            @elseif ($escenaryCount >= 1000000 and $escenaryCount < 1000000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($escenaryCount/1000000) }}</span>M</h3>
                            @elseif ($escenaryCount >= 1000000000 and $escenaryCount < 1000000000000)
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($escenaryCount/1000000000) }}</span>G</h3>
                            @else
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ number_format($escenaryCount) }}</span></h3>
                            @endif
                            <p class="text-muted mb-1 text-truncate">@lang('dashboard.total number of quotes')</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
</div>
<div class="rightbar-overlay"></div>


@endsection
