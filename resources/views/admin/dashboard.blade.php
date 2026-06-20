@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid admin_dashboard_wrapper">
    <div class="admin_dashboard_header mb-4">
        <h2 class="fw-bold text-start"> Dashboard </h2>
    </div>
    <div class="admin_dashboard_section mb-5">
        <h5 class="admin_dashboard_section_title text-start mb-3"> BMET Overview </h5>
        <div class="row g-3">
            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern">
                    <h6>Today BMET</h6>
                    <h3>{{ $totalBmet }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection