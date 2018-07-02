<!-- 时间轴-->
@include('home.common.header')
<!-- 微语 -->
<div>
    <div class="timeline animated">
        <div class="timeline-row">
            <div class="timeline-time">
                <small style="color:#000">时间</small>{{ date('Y-m-d H:i:s', time()) }}
            </div>
            <div class="timeline-icon">
                <div class="bg-primary">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="panel timeline-content">
                <div class="panel-body">
                    <h2>

                    </h2>
                    <p style="font-size:20px;width:75%;">

                    </p>
                </div>
            </div></div></div>

@include('home.common.footer')
@section('style')
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/home/time.css') }}]"/>
@endsection
