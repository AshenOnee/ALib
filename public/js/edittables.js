/**
 * Created by User on 26.06.2017.
 */
var app = new Vue({
    el: '#app',
    data: {
        brand: window.brand,
        brands: window.brands,
        model: window.model,
        models: window.models,
        message: window.message,
        show: false,
        filename: '',
        image: null,
        file: '',
    },
    methods:{
        editPath: function () {
            return '/models/' + this.model.id;
        },

        editPathBrand: function () {
            return '/brands/' + this.brand.id;
        },

        onDeleteBrand: function ($brand) {
            $url="/brands/" + $brand.id;
            axios.delete($url)
                .then(function(response){
                    window.location = window.location;
                });
        },

        onEditBrand: function ($brand) {
        $url="/actions/edit/brands/" + $brand.id;
        window.location = $url;
        },

        onDeleteModel: function ($model) {
            $url="/models/" + $model.id
            axios.delete($url)
                .then(function(response){
                    window.location = window.location;
                });
        },

        onEditModel: function ($model) {
            $url="/actions/edit/models/" + $model.id;
            window.location = $url;
        },

        isShowMessage: function () {
            if(this.message == "") return false;
            else return true;
        },
    }
})