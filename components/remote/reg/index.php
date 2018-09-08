<link rel="stylesheet" href="/components/css/style.css">
<script type="text/javascript" src="/components/remote/reg/js/script.js"></script>
<div class="wrapper_auth">

	<div id="register-expert" class="mod-btn">
		<h2>Регистрация</h2>
		<form action="javascript:void(0);" method="POST" class="register" >
			<input type="hidden" name="type_user" value="<? echo $type_user; ?>" >
			<fieldset>
				
				<p><label for="last_name">Фамилия:</label> <br><input type="text" id="last_name" name="last_name" value="" ></p>

				
				<p><label for="first_name">Имя:</label> <br><input type="text" id="first_name" name="first_name" value="" ></p>

				
				<p><label for="middle_name">Отчество:</label> <br><input type="text" id="middle_name" name="middle_name" value="" ></p>

				
				<p><label for="gender">Пол:</label> <br><input type="text" id="gender" name="gender" value="" ></p>

				
				<p><label for="birthday">Дата рождения:</label> <br><input type="date" id="birthday" name="birthday" value="" ></p>
				
				<? if ($type_user == 'exp') {?>
				<p><label for="profession">Профессия:</label> <br>
					<select id="profession" name="profession">
						<option value="">...</option>
						<option value="Программист">Программист</option>
						<option value="Механик">Механик</option>
						<option value="Бухгалтер">Бухгалтер</option>
					</select>
				</p>
				<? } ?>
				
				<p><label for="phone_reg">Номер мобильного телефона:</label> <br><input type="tel" id="phone_reg"  name="phone_reg" value="" ></p>

				
				<p><label for="password_reg">Пароль:</label> <br><input type="password" id="password_reg" name="password_reg" value="" ></p> 

				<p><label for="region">Регион:</label> <br>
					<select name="region" id="region">
						<option value="">Выберите область...</option>
						<option value="781930" selected="selected">Без региона</option>
						<?
							for ($i=0; $i < count($regions); $i++) { 
								echo '<option value="'.$regions[$i]->pk_i_id.'" >'.$regions[$i]->s_name.'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<label for="city">Город</label><br>
					<select id="city" name="city">
						<option value="">Выберите город...</option>
						<option value="409201" selected="selected">Без города</option>
					</select>
				</p>

				
				<p><label for="passport_data">Серия и Номер паспорта:</label> <br><input type="text" id="passport_data" name="passport_data" value="" ></p>
				
				<p><input type="checkbox" id="license_data" name="license_data" checked="true" ><label for="license_data">Я принимаю пользовательское соглашение.</label></p>
				<p><input type="checkbox" id="personal_data" name="personal_data" checked="true" ><label for="personal_data">Я согласен на обработку персональных данных.</label></p>
				<p>рекапча будет тут</p>

				<p class="flex-btn-form"><input type="submit" value="Зарегистрироваться"></p>
			</fieldset>
			<div class="success-text-exp-vol" style="display: none;">
				Регистрация прошла успешно !
			</div>
		</form>
	</div>

</div>