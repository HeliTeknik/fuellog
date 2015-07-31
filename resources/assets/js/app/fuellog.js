var GMaps = require('GMaps');
var logForm = require('./../vue/logForm');

module.exports = {

    /**
     * Draw Map for given Coordinates
     * @param  {float} latitude
     * @param  {float} longitude
     * @param  {string} identifier
     * @return {void}
     */
    drawLogMap: function(latitude, longitude, identifier) {

        var map = new GMaps({
            div: identifier,
            lat: latitude,
            lng: longitude
        });

        map.addMarker({
            lat: latitude,
            lng: longitude
        });

    },

    /**
     * Boot Vue.js for log form
     */
    logForm: function(){

        return logForm();

    }
};