/**
 * Created by Cristhian on 15/11/2016.
 */
var Docente = Backbone.Model.extend({
    urlRoot: "nombramiento_docente/nombramiento-docente/public/docente"

});

var DocenteCollection = Backbone.Collection.extend({

    model: Docente,

    url: "nombramiento_docente/nombramiento-docente/public/docente"

});
