<div class="row mgy-15">
	<div class="col-md-4">
		<?
			$query = "SELECT * FROM `users` WHERE `id` = '".$_SESSION['user']->id."'";
			
			
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

			if($result->num_rows)
			{
		        $res = [];
		        while ($row = mysqli_fetch_object($result)) {
		        	$res[] = $row;
		        }
		        mysqli_free_result($result);
		        
		        
			}
		?>
		<form id="user_info">
			<input type="hidden" name="user_id" id="user_id" value="<? echo $res[0]->id; ?>">
			<div class="form-group ">
				<label for="last_name" class="col-sm-12 form-control-label">Фамилия</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Фамилия" value="<? echo $res[0]->last_name; ?>">
				</div>
			</div>
			<div class="form-group ">
				<label for="first_name" class="col-sm-12 form-control-label">Имя</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Имя" value="<? echo $res[0]->first_name; ?>">
				</div>
			</div>
			<div class="form-group ">
				<label for="middle_name" class="col-sm-12 form-control-label">Отчество</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Отчество" value="<? echo $res[0]->middle_name; ?>">
				</div>
			</div>
			<div class="form-group ">
				<label class="col-sm-12 form-control-label">Пол</label>
				<div class="col-sm-12">
					<!-- <input type="text" class="form-control" id="gender" name="gender" placeholder="Пол"> -->
					<div class="input-group">
						<span class="radio" style="margin-right: 15px;">
							<label>
								<input type="radio" name="gender" id="male" value="male" <? if ($res[0]->gender == 'male'){ echo 'checked'; } ?>>
								Мужчина
							</label>
						</span>
						<span class="radio">
							<label>
								<input type="radio" name="gender" id="female" value="female" <? if ($res[0]->gender == 'female'){ echo 'checked'; } ?>>
								Женщина
							</label>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label for="birthday" class="col-sm-12 form-control-label">Дата рождения</label>
				<div class="col-sm-12">
					<input type="date" class="form-control" id="birthday" name="birthday" value="<? echo $res[0]->birthday; ?>">
				</div>
			</div>
			<? if ($res[0]->type_user == 'exp') {?>
				<div class="form-group ">
					<label for="profession" class="col-sm-12 form-control-label">Профессия</label>
					<div class="col-sm-12">
						<select name="profession" id="profession" class="form-control" required="required">
							<option value="">...</option>
							<option value="Программист">Программист</option>
							<option value="Механик">Механик</option>
							<option value="Бухгалтер">Бухгалтер</option>
						</select>
					</div>
				</div>
				<? } ?>
			<div class="form-group ">
				<label for="phone_number" class="col-sm-12 form-control-label">Номер мобильного телефона</label>
				<div class="col-sm-12">
					<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Номер мобильного телефона" value="<? echo $res[0]->phone_number; ?>">
				</div>
			</div>
			<div class="form-group ">
				<label for="city" class="col-sm-12 form-control-label">Населённый пункт</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="city" name="city" placeholder="Населённый пункт" value="<? echo $res[0]->city; ?>">
				</div>
			</div>
			<div class="form-group ">
				<label for="passport_data" class="col-sm-12 form-control-label">Серия и Номер паспорта</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="passport_data" name="passport_data" placeholder="Серия и Номер паспорта" value="<? echo $res[0]->passport_data; ?>">
				</div>
			</div>
			<div class="form-group ">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success form-control">Сохранить</button>
					<div class="valid-feedback">Данные успешно сохранены.</div>
					<div class="invalid-feedback">Что-то пошло не так.</div>
				</div>
			</div>
		</form>
	</div>
</div>