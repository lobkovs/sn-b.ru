$(document).ready(function() {

	flag_creat_map_content = new Array;

	$(".ya-maps").click(function(){
		var	ya_maps_id = $(this).attr('id'),
			maps_content_tag_id = ya_maps_id + "_map_content";
			map_content = $("<div />", {id: maps_content_tag_id, class: "map-content"});

		if (!(ya_maps_id in flag_creat_map_content)) {
			$(this).after(map_content);
			flag_creat_map_content[ya_maps_id] = 1;
			$(this).addClass("show");
			eval(ya_maps_id + "(maps_content_tag_id);");
		} else {
			$(this).toggleClass("show");
			$(this).next().toggle();
		}
	});
});

function expostroy(id) {
	if (!window.myMapexpostroy) {
		myMapexpostroy = new ymaps.Map(id, {
            center: [55.672157, 37.583616],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        });
	myMapexpostroy.geoObjects
		.add(new ymaps.Placemark([55.672157, 37.583616], {
			iconContent: "ЭКСПОСТРОЙ"
			}, {
				preset: "islands#blueStretchyIcon"
			}));
	} else {console.log('myMapexpostroy false');}
} // конец функции expostroy

function artsalon(id) {
	if (!window.myMapartsalon) {
		myMapartsalon = new ymaps.Map(id, {
            center: [55.725152, 37.582332],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        });
	myMapartsalon.geoObjects
		.add(new ymaps.Placemark([55.725152, 37.582332], {
			iconContent: "АРТСАЛОН САНТЕХНИКА"
			}, {
				preset: "islands#blueStretchyIcon"
			}));
	} else {console.log('myMapartsalon false');}
} // конец функции expostroy

function tri_kita(id) {
	if (!window.myMaptri_kita) {
		myMaptri_kita = new ymaps.Map(id, {
            center: [55.702821, 37.355655],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        });
	myMaptri_kita.geoObjects
		.add(new ymaps.Placemark([55.702821, 37.355655], {
			iconContent: "Торговый комплекс «Три Кита»"
			}, {
				preset: "islands#blueStretchyIcon"
			}));
	} else {console.log('myMaptri_kita false');}
} // конец функции expostroy