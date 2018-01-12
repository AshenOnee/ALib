<html>
<head>
    <meta charset="utf-8">
    <title>Новая модель</title>
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
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Редактирование модели</div>
                    <form method="POST" action="/models/create" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="GET">
                        <!-- Table -->
                        <div class="alert alert-danger" v-if="isShowMessage()"><b>Внимание! </b>@{{message}}</div>

                        <table class="table">
                            {{ csrf_field() }}
                            <tr>
                                <td>brand_id</td>
                                <td><input name="brand_id" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td><input name="name" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>power</td>
                                <td><input name="power" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>image</td>
                                <td>
                                    <input name="image" type="file" accept="image/*">
                                </td>
                            </tr>
                            <tr>
                                <td>text</td>
                                <td><textarea name="discription" rows="10" class="form-control"></textarea></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>
<script type="text/javascript">
    window.message = <?=json_encode($message);?>;
</script>
<script type="text/javascript" src={{ URL::asset('js/edittables.js') }}></script>

</body>
</html>