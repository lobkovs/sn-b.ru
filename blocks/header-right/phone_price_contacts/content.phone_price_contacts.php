<span class="text-phone">+7(495)211-34-56</span>
<span class="text-phone">+7(916)170-17-73</span>
<span class="text-phone">sn-b@yandex.ru</span>
<!-- <div class="button">
	<?php# getBlocks("price_link");?>
</div> -->
<div class="button">
	<a class="call fancymodal" href="#feedback-wrapper">�������� �������� ������</a>
		<div id="feedback-wrapper">
			<form action="/feedback-send" id="feedback-form" method="post">
				<fieldset>
					<label for="fio">���</label>
					<input type="text" name="fio" id="fio">
				</fieldset>
				<fieldset>
					<label for="tel">������� <span class="required">(* ���� ����������� ��� ����������)</span></label>
					<input type="text" name="tel" id="tel">
				</fieldset>
				<fieldset>
					<label for="comment">�����������</label>
					<textarea name="comment" id="comment"></textarea>
				</fieldset>
				<fieldset>
					<label for="captcha">������� ����� � �������� <span id="refresh-captcha" title="�������� ��������">(�������� ��������)</span></label>
					<img class="verify-pic" src="/verify" height="50px" width="100px" alt="��������" />
					<input type="text" name="captcha" id="captcha" />
				</fieldset>
				<fieldset>
					<button type="send" class="button">���������</button>
				</fieldset>
			</form>
		</div>
</div>
<img class="location-icon" src="/images/location.png" />
<a class="proezd" href="/contacts">����� ������� � ���� � �� ������������</a>