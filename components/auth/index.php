<link rel="stylesheet" href="components/css/style.css">
<script type="text/javascript" src="components/auth/js/script.js"></script>
<?

$regions = getRegions($link);

?>
<div class="wrapper_auth">
	
	<div id="users-type-btn">
		<div class="wrapper-logo">
			<img src="components/images/logo.jpg">
		</div>
		<button class="btn btn-user" data-type="student">Обучающийся</button>
		<button class="btn btn-user" data-type="expert">Эксперт</button>
		<button class="btn btn-user" data-type="volunteer">Волонтёр</button>
	</div>

	<div id="login-student" class="mod-btn" style="display: none;">
		<h2><span class="fontawesome-lock"></span>Обучающийся <span class="fontawesome-times close-login"></span></h2>
		<form action="javascript:void(0);" method="POST" class="login" >
			<input type="hidden" name="type_user" value="stud" >
			<fieldset>
				<p><label for="phone_student">Телефон:</label></p>
				<p><input type="tel" id="phone_student" name="phone" value="" ></p>

				<p><label for="password_student">Пароль:</label></p>
				<p><input type="password" id="password_student" name="password" value="" ></p> 

				<p class="flex-btn-form"><input type="submit" value="Войти"><button class="btn btn-register color-other" >Регистрация</button></p>
			</fieldset>
		</form>
	</div>

	<div id="register-student" class="mod-btn" style="display: none;">
		<h2>Регистрация <span class="fontawesome-times close-register"></span></h2>
		<form action="javascript:void(0);" method="POST" class="register" >
			<input type="hidden" name="type_user" value="stud" >
			<fieldset>
				
				<p><label for="last_name">Фамилия:</label> <br><input type="text" id="last_name" name="last_name" value="" ></p>

				
				<p><label for="first_name">Имя:</label> <br><input type="text" id="first_name" name="first_name" value="" ></p>

				
				<p><label for="middle_name">Отчество:</label> <br><input type="text" id="middle_name" name="middle_name" value="" ></p>

				
				<p><label>Пол:</label> <br>
					<span class="radio">
						<input type="radio" name="gender" id="male" value="male" checked="checked"> <label for="male">Мужчина</label>
					</span>
					<span class="radio">
						<input type="radio" name="gender" id="female" value="female" > <label for="female">Женщина</label>
					</span>
				</p>

				
				<p><label for="birthday">Дата рождения:</label> <br><input type="date" id="birthday" name="birthday" value="" ></p>

				
				<p><label for="phone_reg">Номер мобильного телефона:</label> <br><input type="tel" id="phone_reg"  name="phone_reg" value="" ></p>

				
				<p><label for="password_reg">Пароль:</label> <br><input type="password" id="password_reg" name="password_reg" value="" ></p> 

				
				<p><label for="region">Регион:</label> <br>
					<select name="region" id="region">
						<option value="">Выберите область...</option>
						<option value="781930" selected="selected">Без региона</option>
						<?
							for ($i=0; $i < count($regions); $i++) { 
								echo '<option value="'.$regions[$i]->pk_i_id.'" >'.$regions[$i]->name.'</option>';
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
				
				<p><input type="checkbox" id="license_data" name="license_data" checked="true"  required ><label for="license_data">Я принимаю <a href="/user_terms.html" target="_blank">пользовательское соглашение</a>.</label></p>
				<p><input type="checkbox" id="personal_data" name="personal_data" checked="true" required  ><label for="personal_data">Я согласен на обработку <a href="/personal_data.html" target="_blank">персональных данных</a>.</label></p>
				<p>рекапча будет тут</p>

				<p class="flex-btn-form"><input type="submit" value="Зарегистрироваться"></p>
			</fieldset>
			<div class="success-text" style="display: none;">
				Регистрация прошла успешно !
			</div>
		</form>
		
	</div>

	<div id="login-expert" class="mod-btn" style="display: none;">
		<h2><span class="fontawesome-lock"></span>Эксперт <span class="fontawesome-times close-login"></span></h2>
		<form action="javascript:void(0);" method="POST" class="login" >
			<input type="hidden" name="type_user" value="exp" >
			<fieldset>
				<p><label for="phone_expert">Телефон:</label></p>
				<p><input type="tel" id="phone_expert" name="phone" value="" ></p>

				<p><label for="password_expert">Пароль:</label></p>
				<p><input type="password" id="password_expert" name="password" value="" ></p> 

				<p class="flex-btn-form"><input type="submit" value="Войти"><a href="components/auth/how_exp" class="link-form" target="_blank">Как зарегистрироваться?</a></p>
			</fieldset>
		</form>
	</div>
	<div id="login-volunteer" class="mod-btn" style="display: none;">
		<h2><span class="fontawesome-lock"></span>Волонтёр <span class="fontawesome-times close-login"></span></h2>
		<form action="javascript:void(0);" method="POST" class="login" >
			<input type="hidden" name="type_user" value="vol" >
			<fieldset>
				<p><label for="phone_volunteer">Телефон:</label></p>
				<p><input type="tel" id="phone_volunteer" name="phone" value="" ></p>

				<p><label for="password_volunteer">Пароль:</label></p>
				<p><input type="password" id="password_volunteer" name="password" value="" ></p> 

				<p class="flex-btn-form"><input type="submit" value="Войти"><a href="components/auth/how_vol" class="link-form" target="_blank">Как стать волонтёром ?</a></p>
			</fieldset>
		</form>
	</div>

</div>