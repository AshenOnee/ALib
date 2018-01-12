<html>
<head>
    <meta charset="utf-8">
    <title>Модели</title>
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
                            Модели
                        </h4>
                        <a href="/actions/add/models">
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
                            <th>brand_id</th>
                            <th>Модель</th>
                            <th>Мощность</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="model in models">
                            <td>@{{model.id}}</td>
                            <td>@{{model.brand_id}}</td>
                            <td>@{{model.name}}</td>
                            <td>@{{model.power}}</td>
                            <td><button v-on:click="onEditModel(model)" class="btn btn-primary">Редактировать</button>
                                <button v-on:click="onDeleteModel(model)" class="btn btn-danger">Удалить</button></td>
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
    window.models = <?=json_encode($models);?>;
</script>
<script type="text/javascript" src={{ URL::asset('js/edittables.js') }}></script>
</body>
</html>