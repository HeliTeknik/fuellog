/**
 * Require modules through Browserify
 */
var Vue = require('vue');


/**
 * This Code should move to it's one file
 */
var vm = new Vue({

    el: '#create-log',

    data: {

        log : {

            fueled_units: 0,
            driven_units: 0,
            cost_per_unit: 0,
            cost_total: 0,
            longitude: 0,
            latitude: 0,

        },

        hasLocation: false,

        grabbingLocation: false,

        isLocationAvailable: false

    },

    methods: {

        /**
         * Calc Total cost
         */
        calcTotal: function() {

            calc = this.log.fueled_units * this.log.cost_per_unit;

            this.log.cost_total = Math.round(calc * 100) / 100;

        },

        /**
         * Grab current location of the user
         */
        getLocation: function() {

            if (navigator.geolocation) {

                var that = this;

                this.grabbingLocation = true; // Show loading message

                navigator.geolocation.getCurrentPosition(function(position) {

                    that.log.longitude        = position.coords.longitude;
                    that.log.latitude         = position.coords.latitude;
                    that.hasLocation      = true; // Show success message to user
                    that.grabbingLocation = false; // Hide loading message

                })
            }
            else {

                // Geolocation is not supported

            }

        },

        isLocationSupported: function() {

            if (navigator.geolocation) {

                this.isLocationAvailable = true;
                return true;

            }

            return false;

        }

    }

});


vm.isLocationSupported();