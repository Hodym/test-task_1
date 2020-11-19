<h1 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:20pt">Тестовая задача по функционалу Yii2</span></h1>

<h1 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:20pt">Вводная часть</span></h1>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">БД</span></h2>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Есть 2 таблицы:</span></p>

<p>&nbsp;</p>

<ol>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">category</span></p>
	</li>
</ol>

<p dir="ltr" style="margin-left: 36pt;"><strong>id</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11) AI</span></p>

<p dir="ltr" style="margin-left: 36pt;"><strong>name</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, varchar(512)</span></p>

<p dir="ltr" style="margin-left: 36pt;"><strong>created_at</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11)</span></p>

<p dir="ltr" style="margin-left: 36pt;"><strong>updated_at</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11)</span></p>

<p>&nbsp;</p>

<ol start="2">
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">element</span></p>
	</li>
</ol>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>id</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11) AI</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>name</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, varchar(512)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>category_id</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11) (внешний ключ, таблица category - id)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>description</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, text</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>param_done</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, double(5,2)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>param_all</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, double(5,2)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>created_at</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span><strong>updated_at</strong><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">, int(11)</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">&nbsp;&nbsp; &nbsp;</span></p>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">Окружение</span></h2>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Yii2 полностью установлен и настроен, доступны дебагер и gii.</span></p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Также, установлены пакеты:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><a href="https://github.com/johnitvn/yii2-ajaxcrud" style="text-decoration:none;"><u>https://github.com/johnitvn/yii2-ajaxcrud</u></a></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><a href="https://github.com/kartik-v/yii2-widget-datetimepicker" style="text-decoration:none;"><u>https://github.com/kartik-v/yii2-widget-datetimepicker</u></a></p>
	</li>
</ul>

<p>&nbsp;</p>

<h1 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:20pt">Описание задачи</span></h1>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Необходимо создать для 2х таблиц функционал CRUD. На выходе должны получиться 2 страницы. Создание, редактирование, просмотр и удаление должны осуществляться в модальных окнах (см. описание </span><a href="https://github.com/johnitvn/yii2-ajaxcrud" style="text-decoration:none;"><u>johnitvn/yii2-ajaxcrud</u></a><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">). Также, должна присутствовать обработка не ajax запросов.</span></p>

<p>&nbsp;</p>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">Страница Category</span></h2>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Список должен содержать поля:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">id</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">название (name)</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">последнее изменение (updated_at, форматирован в Y.m.d H:i:s)</span></p>
	</li>
</ul>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">По каждому полю должны работать сортировки и фильтры. Фильтр по полю последнее изменение - вида &ldquo;не позднее, чем указано&rdquo;, datetimepicker (</span><a href="https://github.com/kartik-v/yii2-widget-datetimepicker" style="text-decoration:none;"><u>kartik-v/yii2-widget-datetimepicker</u></a><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">).</span></p>

<p>&nbsp;</p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Поля created_at и updated_at должны соответственно заполняться timestamp значениями при создании и редактировании элементов.</span></p>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">Страница Elements</span></h2>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Список должен содержать поля:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">id</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">название (name)</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">категория (название из связанной category)</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">описание (обрезанный до 100та символов description</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Степень завершения (bootstrap progress bar, сколько param_done / param_all в процентах)</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">последнее изменение (updated_at, форматирован в Y.m.d H:i:s)</span></p>
	</li>
</ul>

<p>&nbsp;</p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Должны работать все сортировки:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Сортировка по категории - по name из category.</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Сортировка по степень завершения - по указанному значению (см. описание поля выше)</span></p>
	</li>
</ul>

<p>&nbsp;</p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Фильтры:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">категория - выпадающий список названий категория</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">описание, название - классический like-запрос</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">степень завершения - число %, выборка - значение поля не менее чем указанное значение</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">последнее изменение - &ldquo;не позднее, чем указано&rdquo;, datetimepicker (</span><a href="https://github.com/kartik-v/yii2-widget-datetimepicker" style="text-decoration:none;"><u>kartik-v/yii2-widget-datetimepicker</u></a><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">)</span></p>
	</li>
</ul>

<p>&nbsp;</p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Поля created_at и updated_at должны соответственно заполняться timestamp значениями при создании и редактировании элементов.</span></p>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">Валидация</span></h2>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Category:</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">длина названия</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">проверки по типам данных</span></p>
	</li>
</ul>

<p>&nbsp;</p>

<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Elements</span></p>

<ul>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">длина названия, описания</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Существование category</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">param_done &lt;= param_all</span></p>
	</li>
	<li dir="ltr">
	<p dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">проверки по типам данных</span></p>
	</li>
</ul>

<h2 dir="ltr"><span style="background-color:transparent; color:#000000; font-family:arial; font-size:16pt">Прочее</span></h2>

<p><span style="background-color:transparent; color:#000000; font-family:arial; font-size:11pt">Все названия полей, подписи, названия страниц, хлебные крошки и т.д. &mdash; должны содержаться в языковых файлах (i18n). Язык по-умолчанию указан (ru)</span></p>

<p>&nbsp;</p>
