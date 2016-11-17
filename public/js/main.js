/**
 * Created by Cristhian on 16/11/2016.
 */

var AppRouter = Backbone.Router.extend({
    routes: {
        "docente/add"       : "addDocente",
    },
    addDocente: function() {
        var docente = new Docente();
    }
});
