/**
 * @file
 * Attaches behaviors for the custom Google Maps.
 */

(function ($, Drupal, drupalSettings) {
    /**
     * Initializes the map.
     */
    function init(location) {

        if (location.length) {

            var map = new google.maps.Map(document.getElementById('homepage-map'), {
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: {
                    lat: parseFloat(Number(location[0]['lat'])),
                    lng: parseFloat(Number(location[0]['log']))
                }
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i, contentString;

            var icon_coming_soon = {
                url: "../../../../themes/custom/gsh_theme/assets/images/map_yellow.svg",
                scaledSize: new google.maps.Size(30, 30)
            };

            var icon_not_coming_soon = {
                url: "../../../../themes/custom/gsh_theme/assets/images/map_red.svg",
                scaledSize: new google.maps.Size(30, 30)
            };


            for (i = 0; i < location.length; i++) {

                if (location[i]['coming_soon'] == 0) {
                    marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(Number(location[i]['lat'])),
                            lng: parseFloat(Number(location[i]['log']))
                        },
                        map: map,
                        icon: icon_coming_soon,
                    });
                }

                if (location[i]['coming_soon'] == 1) {
                    marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(Number(location[i]['lat'])),
                            lng: parseFloat(Number(location[i]['log']))
                        },
                        map: map,
                        icon: icon_not_coming_soon,
                    });
                }


                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    infowindow.setContent('');
                    return function () {
                        var url = "/homepage-map-data/" + location[i]['id'];
                        $.ajax({
                            url: url,
                            type: 'GET',
                            contentType: 'application/json; charset=utf-8',
                            success: function (result) {
                                if (result.data.coming_soon == 0) {
                                    contentString = '<div class="homepage-content">' +
                                        '<h3>' + result.data.community_url + '</h3>' +
                                        '<div class="new-homes"> New Homes Starting at $' + result.data.starting_price + '</div>' +
                                        '<a href="https://www.google.com/maps?daddr=' + location[i]['lat'] + ',' + location[i]['log'] + '" target="_blank">Directions</a>' +
                                        '</div>';
                                }
                                else if (result.data.coming_soon == 1) {
                                    contentString = '<div class="homepage-content">' +
                                        '<h3>' + result.data.community_url + ' - Coming Soon</h3>' +
                                        '</div>';
                                }

                                infowindow.setContent(contentString);
                                infowindow.open(map, marker);
                            },
                        });

                    }
                })(marker, i));
            }
        } else {
            var map = new google.maps.Map(document.getElementById('homepage-map'), {
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: {
                    lat: 40.71603764,
                    lng: -73.99978638
                }
            });
        }
    }

    Drupal.behaviors.homepage_mapBehavior = {
        attach: function (context, settings) {
            var location = drupalSettings.homepage_map;
            init(location);
        }
    };

    $(".view-map").on("click", function () {
        $(".block-homepage-maps").addClass("zindex-active");
        $(".homepage-map-wrapper").addClass("active");
        $("body").addClass("mapbg");
        $(".header__container").addClass("zindex-zero");
    });

    $(".map-close").on("click", function () {
        $(".block-homepage-maps").removeClass("zindex-active");
        $(".homepage-map-wrapper").removeClass("active");
        $("body").removeClass("mapbg");
        $(".header__container").removeClass("zindex-zero");
    });

})(jQuery, Drupal, drupalSettings);
