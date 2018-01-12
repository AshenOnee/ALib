<html>
<head>
    <meta charset="utf-8">
    <title>Марки</title>
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
                <div class="panel panel-default custom-table">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h4 class="pull-left">
                            Марки
                        </h4>
                        <a href="/actions/add/brands">
                            <button class="btn btn-success pull-right">
                                Добавить
                            </button>
                        </a>
                        <div class="clearfix">

                        </div>
                    </div>
                    <!-- Table -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Марка</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="brand in brands">
                                <td>@{{brand.id}}</td>
                                <td>@{{brand.name}}</td>
                                <td><button v-on:click="onEditBrand(brand)" class="btn btn-primary">Редактировать</button>
                                <button v-on:click="onDeleteBrand(brand)" class="btn btn-danger">Удалить</button></td>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>
<script type="text/javascript">
    window.brands = <?=json_encode($brands);?>;
</script>
<script type="text/javascript" src={{ URL::asset('js/edittables.js') }}></script>
</body>
</html>