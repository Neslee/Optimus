/**
 * Custom Map Icons.
 *
 */

var map;
var config = {
    accounting: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-accounting"></span>'
    },
    airport: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-airport"></span>'
    },
    amusement_park: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-amusement-park"></span>'
    },
    aquarium: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-aquarium"></span>'
    },
    art_gallery: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-art-gallery"></span>'
    },
    atm: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#ff6e40',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-atm"></span>'
    },
    bakery: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-bakery"></span>'
    },
    bar: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-bar"></span>'
    },
    beauty_salon: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e040fb',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-beauty-salon"></span>'
    },
    bicycle_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon   map-icon-bicycle-store"></span>'
    },
    book_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon   map-icon-book-store"></span>'
    },
    bowling_alley: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-bowling-alley"></span>'
    },
    bus_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-bus-station"></span>'
    },
    cafe: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-cafe"></span>'
    },
    campground: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-campground"></span>'
    },
    car_rental: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-car-rental"></span>'
    },
    car_repair: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon   map-icon-car-repair"></span>'
    },
    car_wash: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-car-wash"></span>'
    },
    casino: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-casino"></span>'
    },
    cemetery: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-cemetery"></span>'
    },
    church: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-church"></span>'
    },
    city_hall: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-city-hall"></span>'
    },
    clothing_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-clothing-store"></span>'
    },
    convenience_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-convenience-store"></span>'
    },
    courthouse: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#a23c6b',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-courthouse"></span>'
    },
    dentist: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-dentist"></span>'
    },
    department_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-department-store"></span>'
    },
    doctor: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-doctor"></span>'
    },
    electrician: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-electrician"></span>'
    },
    electronics_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-electronics-store"></span>'
    },
    embassy: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-embassy"></span>'
    },
    fire_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-fire-station"></span>'
    },
    florist: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-florist"></span>'
    },
    funeral_home: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-funeral-home"></span>'
    },
    furniture_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-furniture-store"></span>'
    },
    gas_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-gas-station"></span>'
    },
    gym: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-gym"></span>'
    },
    hair_care: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-hair-care"></span>'
    },
    hardware_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-hardware-store"></span>'
    },
    hindu_temple: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-hindu-temple"></span>'
    },
    home_goods_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-store"></span>'
    },
    hospital: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-hospital"></span>'
    },
    insurance_agency: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon   map-icon-insurance-agency"></span>'
    },
    laundry: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-laundry"></span>'
    },
    lawyer: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-lawyer"></span>'
    },
    library: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-library"></span>'
    },
    liquor_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-liquor-store"></span>'
    },
    local_government_office: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-local-government"></span>'
    },
    locksmith: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-locksmith"></span>'
    },
    lodging: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: ' #a23c6b',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-lodging"></span>'
    },
    meal_delivery: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-restaurant"></span>'
    },
    meal_takeaway: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-restaurant"></span>'
    },
    mosque: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-mosque"></span>'
    },
    movie_rental: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-movie-rental"></span>'
    },
    movie_theater: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-movie-theater"></span>'
    },
    moving_company: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-moving-company"></span>'
    },
    museum: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-museum"></span>'
    },
    night_club: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#643fc6',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-night-club"></span>'
    },
    painter: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon   map-icon-painter"></span>'
    },
    park: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-park"></span>'
    },
    parking: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-parking"></span>'
    },
    pet_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-pet-store"></span>'
    },
    pharmacy: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-pharmacy"></span>'
    },
    physiotherapist: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-physiotherapist"></span>'
    },
    plumber: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-plumber></span>'
    },
    police: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-police"></span>'
    },
    post_office: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-post-office"></span>'
    },
    real_estate_agency: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-real-estate-agency"></span>'
    },
    roofing_contractor: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e8c533',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-roofing-contractor"></span>'
    },
    rv_park: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-rv-park"></span>'
    },
    restaurant: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-restaurant"></span>'
    },
    school: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-school"></span>'
    },
    locality: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-location-arrow"></span>'
    },
    jewelry_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-jewelry-store"></span>'
    },
    political: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-political"></span>'
    },
    university: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-university"></span>'
    },
    point_of_interest: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0,
        },
        map_icon_label: '<span class="map-icon map-icon-point-of-interest"></span>'
    },
    car_dealer: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-car-dealer"></span>'
    },
    bank: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-bank"></span>'
    },
    store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-store"></span>'
    },
    general_contractor: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#00CCBB',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-general-contractor"></span>'
    },
    zoo: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-zoo"></span>'
    },
    veterinary_care: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-veterinary-care"></span>'
    },
    travel_agency: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-travel-agency"></span>'
    },
    transit_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon  map-icon-transit-station"></span>'
    },
    train_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-train-station"></span>'
    },
    taxi_stand: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-taxi-stand"></span>'
    },
    synagogue: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-synagogue"></span>'
    },
    supermarket: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-grocery-or-supermarket"></span>'
    },
    subway_station: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-grocery-or-supermarket"></span>'
    },
    storage: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3668cd',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-storage"></span>'
    },
    stadium: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e35427',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-stadium"></span>'
    },
    spa: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#cddc39',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-spa"></span>'
    },
    shopping_mall: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#e3851c',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-shopping-mall"></span>'
    },
    shoe_store: {
        icon: {
            path: mapIcons.shapes.SQUARE_PIN,
            fillColor: '#3e2723',
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<span class="map-icon map-icon-shopping-mall"></span>'
    },
};