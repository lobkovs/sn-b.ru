<div id="contacts">
	<h1>��������</h1>
	<div class="contacts-text">
		<span style="color:#ED4543;font-weight:bold;">����� �����</span>: ������, ��. ���������� �����, �.16, ���.9<br>
		<span style="color:#1E98FF;font-weight:bold;">����� ������������</span>: ������, ��. �������� ��������, �.14 (���������� ������ ��� ������������һ)<br>
		�� ����� ��������� ���� ����������� � ������������.<br>
		�������� �������: <b>+7(495)211-34-56</b>, <b>+7(916)170-17-73</b><br>
		<b>E-mail</b>: <a href="mailto:sn-b@yandex.ru">sn-b@yandex.ru</a>
	</div>
	<h2>����� �������</h2>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script>
	ymaps.ready(function () {
	    var myMap = new ymaps.Map('YaMap', {
	            center: [55.696619, 37.449118],
	            zoom: 15
	        }, {
	            searchControlProvider: 'yandex#search'
	        });

		myMap.geoObjects
			.add(new ymaps.Placemark(
				[55.701588, 37.451092],
				{iconContent: "������������"},
				{preset: "islands#blueStretchyIcon"}))
			.add(new ymaps.Placemark(
				[55.691011, 37.447444],
				{iconContent: "����"},
				{preset: "islands#redStretchyIcon"}))
	});
	</script>
	<div id="YaMap"></div>
</div>