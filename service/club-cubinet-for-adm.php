<?php 
sleep(1);
?>							
<div class="resize-remove">
	<div class="box-header with-border">
		<h2 class="box-title">Кабинет клуба <span>№#</span></h2>
		<div class="box-tools pull-right click-remove">
			<a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
		</div>
	</div>
	<!-- /.box-header -->
	<!-- form start -->

	<div class="box-body">

		<div class="col-sm-4 box-avatar-cab">
			<img src="../views/main/img/Button-power-icon.png">
			<p class="telef">Контактный телефон:<span>+38 099 999 99 </span></p>
			<p class="e-mail">Адрес електроной почты: <span>goo@home.now </span></p>
		</div>

		<div class="col-sm-8 cabinet-info">
			<p class="name">Название клуба: <span>Название клуба: </span></p>
			<p class="name_org">Руководитель <span>ФИО </span></p>
			<p>Страна: <span>Украина</span></p>
			<p>Город: <span>Хмельницкий</span></p>
			<p class="name_help">Тренер №1: <span>ФИО</span></p>
			<p class="name_help">Тренер №2: <span>ФИО</span></p>
			<p class="name_help">Тренер №3: <span>ФИО</span></p>
		</div>

		<div class="col-sm-12">

			<div class="box-header">
				<h3 class="box-title">Список участников клуба</h3>
			</div>
			<!-- /.box-header -->

			<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					<div class="col-sm-6">
						<div class="dataTables_length" id="example1_length">
							<label>Show 
								<select name="example1_length" aria-controls="example1" class="form-control input-sm">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select> entries
							</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div id="example1_filter" class="dataTables_filter">
							<label>Search:<input class="form-control input-sm" placeholder="" aria-controls="example1" type="search">
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Номер№</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 224px;" aria-label="Browser: activate to sort column ascending">ФИО</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Platform(s): activate to sort column ascending">Возраст</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155px;" aria-label="Engine version: activate to sort column ascending">Номер телефона</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110px;" aria-label="CSS grade: activate to sort column ascending">Год рождения</th>
								</tr>
							</thead>
							<tbody>
								<tr role="row" class="odd">
									<td class="sorting_1">Gecko</td>
									<td>Firefox 1.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td>1.7</td>
									<td>A</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Gecko</td>
									<td>Firefox 1.5</td>
									<td>Win 98+ / OSX.2+</td>
									<td>1.8</td>
									<td>A</td>
								</tr>
								<tr role="row" class="odd">
									<td class="sorting_1">Gecko</td>
									<td>Firefox 2.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td>1.8</td>
									<td>A</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Gecko</td>
									<td>Firefox 3.0</td>
									<td>Win 2k+ / OSX.3+</td>
									<td>1.9</td>
									<td>A</td>
								</tr>
								<tr role="row" class="odd">
									<td class="sorting_1">Gecko</td>
									<td>Camino 1.0</td>
									<td>OSX.2+</td>
									<td>1.8</td>
									<td>A</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Gecko</td>
									<td>Camino 1.5</td>
									<td>OSX.3+</td>
									<td>1.8</td>
									<td>A</td>
								</tr>
								<tr role="row" class="odd">
									<td class="sorting_1">Gecko</td>
									<td>Netscape 7.2</td>
									<td>Win 95+ / Mac OS 8.6-9.2</td>
									<td>1.7</td>
									<td>A</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Gecko</td>
									<td>Netscape Browser 8</td>
									<td>Win 98SE+</td>
									<td>1.7</td>
									<td>A</td>
								</tr>
								<tr role="row" class="odd">
									<td class="sorting_1">Gecko</td>
									<td>Netscape Navigator 9</td>
									<td>Win 98+ / OSX.2+</td>
									<td>1.8</td>
									<td>A</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Gecko</td>
									<td>Mozilla 1.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td>1</td>
									<td>A</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th rowspan="1" colspan="1">Номер№</th>
									<th rowspan="1" colspan="1">ФИО</th>
									<th rowspan="1" colspan="1">Возраст</th>
									<th rowspan="1" colspan="1">Номер телефона</th>
									<th rowspan="1" colspan="1">Год рождения</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

				<div class="row">

					<div class="col-sm-5">

						<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
					</div>

					<div class="col-sm-7">

						<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
							<ul class="pagination">
								<li class="paginate_button previous disabled" id="example1_previous">
									<a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
								</li>
								<li class="paginate_button active">
									<a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
								</li>
								<li class="paginate_button ">
									<a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
								</li>
								<li class="paginate_button ">
									<a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
								</li>
								<li class="paginate_button ">
									<a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
								</li>
								<li class="paginate_button ">
									<a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
								</li>
								<li class="paginate_button ">
									<a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
								</li>
								<li class="paginate_button next" id="example1_next">
									<a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">

					<a type="submit" id="add_part" class="btn btn-info">Добавить участника</a>
				</div>
			</div>
		</div>
	</div>
</div>