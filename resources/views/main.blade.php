<html>
	<head>
		<meta charset="utf-8">
		<title>auto-library</title>
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
					<h1>Библиотека автомобилей</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="discription">
						<p> 
							Самый большой(нет) веб-справочник по автомобилям. 
							Данный сайт может быть полезен(нет) для тех кто выбирает автомобиль для покупки.

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="myborder">
					 <div class="form-group">
					    <label for="brand">Марка</label>
						 <select class="form-control" id="brand" name="brand" v-model="selectedbrand" v-on:change="onChange">
			    				<option hidden ></option>
						    	<option v-for="brand in brands" :value="brand.id">
										@{{brand.name}}
						    	</option>
						 </select>
					 </div>
				
					  <div class="form-group" id="model-fields" v-if="selectedbrand">
                          <label for="model">Модель</label>
                          <div class="input-group">
                              <select class="form-control" id="model" name="model"  v-model="selectedmodel">
                                  <option hidden></option>
                                  <option v-for="car in cars" :value="car.id">
                                      @{{car.model}}
                                  </option>
                              </select>
                              <div class="input-group-btn">
                                  <div class="alignright">
                                      <button v-on:click="clear" type="submit" class="btn btn-warning">Очистить</button>
                                  </div>
                              </div>
                          </div>
					  </div>

                        <div class="clearfix">
                        </div>
					</div>
				</div>
			</div>
			<div class="row" v-if="cars.length > 0">
			  <div class="col-md-12">
			  	<div class="panel panel-default custom-table">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Автомобили</div>
					  <!-- Table -->
					  <table class="table">
					  	<thead>
					  		<tr>
								<th>id</th>
								<th>Марка</th>
								<th>Модель</th>
								<th>Мощность</th>
							</tr>
					  	</thead>
					   	<tbody>
						{{--onclick="location.href='/discription/car.id'"--}}
							<tr v-for="car in cars" v-if="filter(car)" v-on:click="select(car)">
									<td>@{{car.id}}</td>
									<td>@{{car.brand}}</td>
									<td>@{{car.model}}</td>
									<td>@{{car.power}}</td>
							</tr>
						</tbody>
				  </table>
				</div>
			  </div>
			</div>
		</div>
	</div>

	@include('footer')

	<script type="text/javascript">
		window.brands = <?=json_encode($brands);?>;
		window.cars = <?=json_encode($cars);?>;
	</script>
	<script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>
	</body>
</html>