<span class="text-phone">+7(495)211-34-56</span>
<span class="text-phone">+7(916)170-17-73</span>
<span class="text-phone">sn-b@yandex.ru</span>
<!-- <div class="button">
	<?php# getBlocks("price_link");?>
</div> -->
<div class="button">
	<a class="call fancymodal" href="#feedback-wrapper">Заказать обратный звонок</a>
		<div id="feedback-wrapper">
			<form action="/feedback-send" id="feedback-form" method="post">
				<fieldset>
					<label for="fio">ФИО</label>
					<input type="text" name="fio" id="fio">
				</fieldset>
				<fieldset>
					<label for="tel">Телефон <span class="required">(* Поле обязательно для заполнения)</span></label>
					<input type="text" name="tel" id="tel">
				</fieldset>
				<fieldset>
					<label for="comment">Комментарий</label>
					<textarea name="comment" id="comment"></textarea>
				</fieldset>
				<fieldset>
					<label for="captcha">Введите текст с картинки <span id="refresh-captcha" title="Обновить картинку">(обновить картинку)</span></label>
					<img class="verify-pic" src="/verify" height="50px" width="100px" alt="Картинка" />
					<input type="text" name="captcha" id="captcha" />
				</fieldset>
				<fieldset>
					<button type="send" class="button">Отправить</button>
				</fieldset>
			</form>
		</div>
</div>
<img class="location-icon" src="/images/location.png" />
<a class="proezd" href="/contacts">Схема проезда в офис и на производство</a>