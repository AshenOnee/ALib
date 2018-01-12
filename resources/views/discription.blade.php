<html>
<head>
    <meta charset="utf-8">
    <title>Описание</title>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-theme.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/style.css') }}>
    <script type="text/javascript" src={{ URL::asset('js/jquery-3.2.1.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/vue.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/axios.min.js') }}></script>
</head>

<body>
<div id="app">

    {{--Header--}}
    @include('header')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <img :src="car.image"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>@{{ car.brand.name }} @{{ car.name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="discription">
                    <p>
                        @{{ car.discription }}
                    </p>
                </div>
            </div>
        </div>

    </div>
    @include('footer')

</div>
<script type="text/javascript">
    window.car = <?=json_encode($car);?>;
</script>
<script type="text/javascript" src={{ URL::asset('js/discription.js') }}></script>
</body>
</html>