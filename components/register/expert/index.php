<link rel="stylesheet" href="components/css/style.css">
<script type="text/javascript" src="components/register/expert/js/script.js"></script>
<div class="wrapper_auth">

	<div id="register-expert" class="mod-btn">
		<h2>Регистрация</h2>
		<form action="javascript:void(0);" method="POST">
			<fieldset>
				
				<p><label for="last_name">Фамилия:</label> <br><input type="text" id="last_name" name="last_name" value="" ></p>

				
				<p><label for="first_name">Имя:</label> <br><input type="text" id="first_name" name="first_name" value="" ></p>

				
				<p><label for="middle_name">Отчество:</label> <br><input type="text" id="middle_name" name="middle_name" value="" ></p>

				
				<p><label for="gender">Пол:</label> <br><input type="text" id="gender" name="gender" value="" ></p>

				
				<p><label for="birthday">Дата рождения:</label> <br><input type="text" id="birthday" name="birthday" value="" ></p>

				<p><label for="profession">Профессия:</label> <br>
					<select id="profession" name="profession">
						<option value="">...</option>
						<option value="Программист">Программист</option>
						<option value="Механик">Механик</option>
						<option value="Бухгалтер">Бухгалтер</option>
					</select>
				</p>
				
				<p><label for="phone_reg">Номер мобильного телефона:</label> <br><input type="text" id="phone_reg"  name="phone_reg" value="" ></p>

				
				<p><label for="password_reg">Пароль:</label> <br><input type="password_reg" id="password_reg" name="password_reg" value="" ></p> 

				
				<p><label for="city">Населённый пункт:</label> <br><input type="text" id="city" name="city" value="" ></p>

				
				<p><label for="passport_data">Серия и Номер паспорта:</label> <br><input type="text" id="passport_data" name="passport_data" value="" ></p>
				
				<p><input type="checkbox" id="license_data" name="license_data" checked="true" ><label for="license_data">Я принимаю пользовательское соглашение.</label></p>
				<p><input type="checkbox" id="personal_data" name="personal_data" checked="true" ><label for="personal_data">Я согласен на обработку персональных данных.</label></p>
				<p>рекапча будет тут</p>

				<p class="flex-btn-form"><input type="submit" value="Зарегистрироваться"></p>
			</fieldset>
		</form>
	</div>

</div>