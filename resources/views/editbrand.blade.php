<html>
<head>
    <meta charset="utf-8">
    <title>Редактирование</title>
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
                <form method="POST" :action="editPathBrand()">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <table class="table">
                        <tr>
                            <td>name</td>
                            <td><input name="name" type="text" class="form-control" v-model="brand.name"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>


            </div>
        </div>


    </div>
    @include('footer')

</div>
<script type="text/javascript">
    window.brand = <?=json_encode($brand);?>;
</script>
<script type="text/javascript" src={{ URL::asset('js/edittables.js') }}></script>
</body>
</html>