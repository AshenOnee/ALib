/**
 * Created by User on 26.06.2017.
 */
var app = new Vue({
    el: '#app',
    data: {
        car: window.car,
        brand: window.brand,
        brands: window.brands,
        model: window.model,
        models: window.models,
        selectedbrand: null,
        selectedmodel: null,
        filename: '',
        image: null,
        file: '',
    },
    methods:{
        brandClick: function () {
            window.location = window.location + "/brands";
        },
        modelClick: function () {
            window.location = window.location + "/models";
        },
        selectbrand: function () {
            window.location = window.location + "/" + this.selectedbrand;
        },
        selectmodel: function () {
            window.location = window.location + "/" + this.selectedmodel;
        },
    }
})