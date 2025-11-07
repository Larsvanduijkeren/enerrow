jQuery.noConflict();

(function ($) {
    $(document).ready(function () {
        map();

        AOS.init({
            offset: 200,
        });
    });

    let map = function () {
        let map = $('#mapbox');

        if (map && map.length > 0) {
            mapboxgl.accessToken = 'pk.eyJ1IjoibGFyc3ZhbmR1aWprZXJlbiIsImEiOiJjbDEwdnY4eWgwNWVtM2txbm0zZGozNG1qIn0.KJ9bwT7DCDPsjehlokg9-Q';

            let map = new mapboxgl.Map({
                container: 'mapbox',
                style: 'mapbox://styles/larsvanduijkeren/cmhka95t3002a01sj1twd4kw8',
                zoom: 15,
                center: [
                    longitude,
                    latitude,
                ],
                bearing: 0,
            });

            map.on('load', () => {
                let images = [
                    {
                        imageUrl: '/wp-content/themes/websheriff/library/images/marker.png',
                        id: 'location',
                        coordinates: [longitude, latitude],
                    },
                ];
            
                images.forEach(img => {
                    map.loadImage(img.imageUrl, function (error, res) {
                        map.addImage(img.id, res);
                    });
            
                    map.addLayer({
                        'id': img.id,
                        'type': 'symbol',
                        'source': {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': [{
                                    'type': 'Feature',
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': img.coordinates,
                                    },
                                }],
                            },
                        },
                        'layout': {
                            'icon-image': img.id,
                            'icon-size': 0.9,
                            'icon-anchor': 'bottom',
                        },
                    });
                });
            });
        }
    }
})(jQuery);
