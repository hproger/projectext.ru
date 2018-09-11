<div class="row mgy-15">
	<div class="col-md-12">
		<div class="controls btn-group" >
			<button type="button" class="control btn btn-success mixitup-control-active" data-filter="all">Все</button>
			<button type="button" class="control btn btn-success" data-filter=".stud">Обучающиеся</button>
			<button type="button" class="control btn btn-success" data-filter=".exp">Эксперты</button>
			<button type="button" class="control btn btn-success" data-filter=".vol">Волонтёры</button>
		</div>
	</div>
</div>
<div class="row mgy-15">
	<div class="col-md-12">
	  	<ul class="list-group" id="list-group" >
	  	<?
	  		$query = "SELECT * FROM `users`";
	  		
	  		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	  		if($result->num_rows)
	  		{
	  		    
	  	        while ($row = mysqli_fetch_object($result)) {
	  	        	echo "<li class='mix list-group-item $row->type_user' >
	  	        		<div class='row'>
	  	        			<div class='col-md-10 my-auto'>$row->last_name $row->first_name $row->middle_name</div>
	  	        			<div class='col-md-2 tar'>
	  	        				<div class='btn-group' role='group' aria-label='Editable buttons'>
	  	        					<button type='button' data-id='$row->id' class='btn btn-success btn-edit-user' data-toggle='modal' data-target='#editor-user'><i class='fas fa-user-edit'></i></button>
	  	        					<button type='button' data-id='$row->id' class='btn btn-info btn-info-user'><i class='fas fa-info'></i></button>
	  	        					<button type='button' data-id='$row->id' class='btn btn-danger btn-remove-user'><i class='fas fa-times'></i></button>
	  	        				</div>
	  	        			</div>
	  	        		</div>
	  	        		</li>";
	  	        }
	  	        mysqli_free_result($result);
	  	        
	  		}
	  		else {
	  			echo "Пользователей нет";
	  		}
	  	?>
	  	</ul>
	  	
	</div>
</div>

<div class="modal fade" id="editor-user">
	<div class="modal-dialog" role="editor-user">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Редактирование</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="user_info">
					<input type="hidden" name="user_id" id="user_id">
					<div class="form-group ">
						<label for="last_name" class="col-sm-12 form-control-label">Фамилия</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Фамилия">
						</div>
					</div>
					<div class="form-group ">
						<label for="first_name" class="col-sm-12 form-control-label">Имя</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Имя">
						</div>
					</div>
					<div class="form-group ">
						<label for="middle_name" class="col-sm-12 form-control-label">Отчество</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Отчество">
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-12 form-control-label">Пол</label>
						<div class="col-sm-12">
							<!-- <input type="text" class="form-control" id="gender" name="gender" placeholder="Пол"> -->
							<div class="input-group">
								<span class="radio" style="margin-right: 15px;">
									<label>
										<input type="radio" name="gender" id="male" value="male" >
										Мужчина
									</label>
								</span>
								<span class="radio">
									<label>
										<input type="radio" name="gender" id="female" value="female" >
										Женщина
									</label>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<label for="birthday" class="col-sm-12 form-control-label">Дата рождения</label>
						<div class="col-sm-12">
							<input type="date" class="form-control" id="birthday" name="birthday" >
						</div>
					</div>
					<div class="form-group ">
						<label for="profession" class="col-sm-12 form-control-label">Профессия</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="profession" name="profession" placeholder="Профессия">
						</div>
					</div>
					<div class="form-group ">
						<label for="phone_number" class="col-sm-12 form-control-label">Номер мобильного телефона</label>
						<div class="col-sm-12">
							<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Номер мобильного телефона">
						</div>
					</div>
					<!-- <div class="form-group ">
						<label for="city" class="col-sm-12 form-control-label">Населённый пункт</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="city" name="city" placeholder="Населённый пункт">
						</div>
					</div> -->
					<div class="form-group">
						<label for="region"  class="col-sm-12 form-control-label">Регион:</label>
						<div class="col-sm-12">
							<select name="region" id="region" class="form-control">
								<option value="">Выберите область...</option>
								<option value="781930">Без региона</option>
								<?
									for ($i=0; $i < count($regions); $i++) { 
										echo '<option value="'.$regions[$i]->pk_i_id.'" >'.$regions[$i]->s_name.'</option>';
									}
								?>
							</select>
						</div>
						
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-12 form-control-label">Город</label>
						<div class="col-sm-12">
							<select id="city" name="city" class="form-control">
								<option value="">Выберите город...</option>
								<option value="409201">Без города</option>
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label for="passport_data" class="col-sm-12 form-control-label">Серия и Номер паспорта</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="passport_data" name="passport_data" placeholder="Серия и Номер паспорта">
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
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
