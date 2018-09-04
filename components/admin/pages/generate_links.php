<?
function getLinks($type, $link) {
	$query = "SELECT * FROM `temp_links` WHERE `type_link` = '".$type."' LIMIT 10";
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	if($result->num_rows)
	{
	    $res = "";
        while ($row = mysqli_fetch_object($result)) {
        	$res .= "<li class='list-group-item ovfx-a'>$row->link</li>";
        }
        mysqli_free_result($result);
        echo $res;
	}
	else {
		echo "Свободных ссылок нет.";
	}
}
?>

<div class="row mgy-15">
	<div class="col-md-12">
		<div role="tabpanel">
	        <ul class="nav nav-pills" id="myTab" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="experts-tab" data-toggle="tab" href="#experts" role="tab" aria-controls="experts" aria-selected="true">Эксперты</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="volunteer-tab" data-toggle="tab" href="#volunteer" role="tab" aria-controls="volunteer" aria-selected="false">Волонтёры</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTabContent">
	          <div class="tab-pane fade show active" id="experts" role="tabpanel" aria-labelledby="experts-tab">
				<form class="generate_links">
					<input type="hidden" name="type_links" value="exp">
					<div class="form-row">
						<div class="form-group col-sm-3">
							<label for="inputCountLinksExp" class="col-sm-12 form-control-label">Количество генерируемых ссылок</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="inputCountLinksExp" name="inputCountLinksExp" placeholder="">
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label for="inputDateActiveLinkExp" class="col-sm-12 form-control-label">Срок годности ссылки (в днях)</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="inputDateActiveLinkExp" name="inputDateActiveLinkExp" placeholder="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success genLinkBtn">Сгенерировать</button>
						</div>
					</div>
				</form>
				<br>
				<ul class="list-group">
					<?
						getLinks('exp', $link);
					?>
				</ul>
				<div class="row mgy-15">
					<div class="col-sm-2 offset-sm-5">
						<button type="button" class="btn btn-success getNextLink">Показать ещё 10</button>
					</div>
				</div>
	          </div>
	          <div class="tab-pane fade" id="volunteer" role="tabpanel" aria-labelledby="volunteer-tab">
				<form class="generate_links">
					<input type="hidden" name="type_links" value="vol">
					<div class="form-row">
						<div class="form-group col-sm-3">
							<label for="inputCountLinksVol" class="col-sm-12 form-control-label">Количество генерируемых ссылок</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="inputCountLinksVol" name="inputCountLinksVol" placeholder="">
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label for="inputDateActiveLinkVol" class="col-sm-12 form-control-label">Срок годности ссылки (в днях)</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="inputDateActiveLinkVol" name="inputDateActiveLinkVol" placeholder="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-success genLinkBtn">Сгенерировать</button>
						</div>
					</div>
				</form>
				<br>
				<ul class="list-group">
					<?
						getLinks('vol', $link);
					?>
				</ul>
				<div class="row mgy-15">
					<div class="col-sm-2 offset-sm-5">
						<button type="button" class="btn btn-success getNextLink">Показать ещё 10</button>
					</div>
				</div>
	          </div>
	        </div>
		</div>
	</div>
</div>
