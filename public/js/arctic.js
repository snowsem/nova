// События
fireEvent = function($name) {

	// Яндекс.Метрика
	if (typeof yaCounter4338892!='undefined')
		switch ($name) {
			case 'callback_form':
			case 'contacts_form':
			case 'order_form':
			case 'council_form':
				yaCounter4338892.reachGoal($name);
				break;
		}

	// Google Analytics
	if (typeof _gaq!='undefined') {
		var title = 'Неизвестная форма';
		switch ($name) {
			case 'callback_form':
				title = 'Перезвоните';
				break;
			case 'contacts_form':
				title = 'Отправить сообщение';
				break;
			case 'order_form':
				title = 'Заказать услугу';
				break;
			case 'council_form':
				title = 'Получить совет';
				break;
		}
		_gaq.push(['_setCustomVar',
			1,
			'Запрос через форму',
			title,
			3
		]);
		_gaq.push(['_trackEvent',
			'Запрос через форму',
			title
		]);
	}

}


// Утилиты
utils = {


	// Уникальный идентификатор
	id: 0,
	getId: function() {
		utils.id++;
		return 'uniqueIdentificator' + utils.id;
	},


	// Nano Templates
	tpl: function(template, data) {
		return template.replace(/\{([\w\.]*)\}/g, function(str, key) {
			var keys = key.split("."), value = data[keys.shift()];
			$.each(keys, function() {
				value = value[this];
			});
			return (value===null || value===undefined) ? "" : value;
		});
	},


	// Предзагрузка изображений
	preloadImages: function() {
		var images = (typeof arguments[0]=='object') ? arguments[0] : arguments;
		for (var i = 0; i<images.length; i++) {
			$("<img>").attr("src", images[i]);
		}
	},


	// Rollover-эффект
	rolloverImages: function(block) {
		$(block + ' IMG[data-rollover]').hover(
				function() {
					var rollover = $(this).data('rollover');
					$(this).data('rollover', $(this).attr('src'));
					$(this).attr('src', rollover);
				},
				function() {
					var rollover = $(this).data('rollover');
					$(this).data('rollover', $(this).attr('src'));
					$(this).attr('src', rollover);
				}
		).each(function() {
					utils.preloadImages($(this).data('rollover'));
				});
	},


	// Ввод по маске
	maskedInput: function(els) {
		els.each(function() {
			var $this = $(this);
			if (!$this.data('maskInit')) {
				$this.addClass(utils.getId).data('maskInit', true).mask($this.data('mask'));
			}
		});
	},


	// API Яндекс.Карт
	ymaps: {
		callbacks: [],
		loading: false,
		loaded: false,
		go: function() {
			utils.ymaps.loaded = true;
			$.each(utils.ymaps.callbacks, function() {
				this();
			});
		},
		load_api: function(callback) {
			if (utils.ymaps.loaded) {
				callback();
				return;
			}
			utils.ymaps.callbacks.push(callback);
			if ((typeof(ymaps)==='undefined') && !utils.ymaps.loading) {
				utils.ymaps.loading = true;
				$.getScript('http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU&coordorder=longlat', function(data, textStatus) {
					if (textStatus=='success')
						ymaps.load(['package.full'], utils.ymaps.go);
				});
			}
		}
	}


};
$(function() {
	utils.rolloverImages('');
	utils.maskedInput($('.js-mask'));
});


// Визаулизатор AJAX-загрузки
ajaxLoader = {

	add: function(el, type) {

		el = $(el);

		// Тип лоадера
		type = type==undefined ? 'standart' : type;

		if (el.css('position')!='absolute')
			el.css('position', 'relative');

		if (!$('.b-loader', el).length)
			$('<div class="b-loader"><div class="b-loader-bg"></div><div class="b-loader-w"><div class="b-loader-bar"></div></div></div>').prependTo($(el));

		if (type=='alt') {
			$('.b-loader', el).addClass('b-loader-alt');
			$('.b-loader-bar', el).css('backgroundImage', 'url(' + SITE_FRONTEND_FILES + 'images/loader.gif?' + (new Date().getTime()) + ')');
		} else {
			$('.b-loader', el).removeClass('b-loader-alt');
			$('.b-loader-bar', el).css('backgroundImage', 'url(' + SITE_FRONTEND_FILES + 'images/loader_alt.gif?' + (new Date().getTime()) + ')');
		}

		return $('.b-loader', el);
	},

	setWidth: function(loader, w) {
		loader.width(w + 'px');
	},

	setHeight: function(loader, h) {
		$('.b-loader-bg', loader).height(h + 'px');
		$('.b-loader-bar', loader).css('margin-top', (h - (loader.hasClass('b-loader-alt') ? 15 : 31) )/2 + 'px');
	}

};


// Всплывающие окна
box = {


	// Шаблон для окна с сообщением
	tpl_message: '<div class="box-base box-info">' +
			'	<div class="box-base_close arcticmodal-close">закрыть</div>' +
			'	<div class="box-base_title">{title}</div>' +
			'	<div class="box-base_text">{text}</div>' +
			'	<div class="box-base_buttons"><button class="f-btn f-btn-simple arcticmodal-close">Закрыть</button></div>' +
			'</div>',


	// Сообщение
	alert: function(text, title) {
		text = text==undefined ? '' : text;
		title = title==undefined ? 'Сообщение' : title;
		$.arcticmodal({
			content: utils.tpl(box.tpl_message, {
				title: title,
				text: text
			}),
			afterOpen: function(data, el) {
				$('.f-btn', data.body).focus();
			}
		});
	},


	// Сообщение об ошибке
	error: function(text, title) {
		box.alert(text, title==undefined ? 'Ошибка' : title);
	},


	// Инициализация
	init: function() {

		// Умолчания
		$.arcticmodal('setDefault', {
			overlay: {
				css: {
					backgroundColor: '#000',
					opacity: .6
				}
			}
		});

		// Показать
		$('.js-box').click(function() {
			var $this = $(this);
			$($this.data('box')).arcticmodal({
				clone: true,
				afterOpen: function(data, el) {
					utils.maskedInput($('.js-boxMask', data.body));
				}
			});
			return false;
		});

	}


};
$(function() {
	box.init();
});


// AJAX формы
ajaxForm = {


	// Вывод ошибок
	updateErrors: function(block, elClass, errors) {
		block = $(block);
		elClass = '.' + elClass;
		block.find(elClass).hide();
		for (var key in errors)
			if (errors[key].length)
				block.find(elClass + '-' + key).html(errors[key]).show();
	},


	// Отправка формы
	submit: function() {
		var block = $(this);
		var loaderBlock = block.closest($(this).data('loaderContainer'));
		if (!loaderBlock.length)
			loaderBlock = block;
		var loader = ajaxLoader.add(loaderBlock);
		ajaxLoader.setHeight(loader, loaderBlock.outerHeight());
		$.ajax({
			type: 'POST',
			cache: false,
			dataType: 'json',
			data: block.serialize(),
			url: block.attr('action'),
			beforeSend: function() {
				loader.show();
			},
			success: function(data) {
				loader.hide();
				if (data.error) {
					ajaxForm.updateErrors(block, 'js-form_error', data.errors);
				} else {
					fireEvent(block.data('analyticTarget'));
					block.trigger('ajaxFormSuccess', data);
					ajaxForm.updateErrors(block, 'js-form_error', []);
					block.find('INPUT, SELECT, TEXTAREA').val('');
				}
			},
			error: function() {
				loader.hide();
				alert('Ошибка на сервере. Попробуйте позднее.');
			}
		});
		return false;
	},


	// Инициализация
	init: function() {
		$('.js-form').submit(ajaxForm.submit).bind('ajaxFormSuccess', function(e, params) {
			var $this = $(this)
			if ($this.data('successCloseBox'))
				$this.arcticmodal('close');
			if ($this.data('successShowBox'))
				box.alert(params.successText);
			if ($this.data('successReplace'))
				$this.replaceWith(utils.tpl($this.data('successReplace'), params));
		});
	}


};
$(function() {
	ajaxForm.init();
});


// Контакты
contacts = {


	// Контейнер
	container: undefined,


	// Инициализация карты
	mapInit: function(block) {
		var $this = contacts;
		utils.ymaps.load_api(function() {
			var mapBlock = block.find('.map');
			if (mapBlock.html()=='') {

				var point = [mapBlock.data('x'), mapBlock.data('y')];

				// Создаём метку
				var placemark = new ymaps.Placemark(point, {
				}, {
					preset: 'twirl#blueDotIcon',
					cursor: 'grab'
				})

				// Создаём карту
				var map = new ymaps.Map(mapBlock.get(0), {
					center: point,
					zoom: mapBlock.data('zoom'),
					behaviors: ["default", "scrollZoom"]
				});
				map.controls.add('mapTools').add('zoomControl').add('typeSelector');

				// Добавляем метку
				map.geoObjects.add(placemark);

			}
		});
	},


	// Инициализация
	init: function() {
		var $this = contacts;

		// Контейнер
		$this.container = $('.b-contacts');

		// Как добираемся?
		$this.container.find('.b-contacts_body .type_item').click(function() {
			if (!$(this).hasClass('b-ajaxLink'))
				return;
			var container = $(this).closest('.body');
			container.find('.type_item').not(this).addClass('b-ajaxLink');
			$(this).removeClass('b-ajaxLink');
			var body = container.find('.typeInfo-' + $(this).data('tab'));
			container.find('.typeInfo').removeClass('typeInfo-active');
			body.addClass('typeInfo-active');
		});

		// Создаём карту
		$this.mapInit($this.container.find('.b-contacts_body'));

	}


};
$(function() {
	contacts.init();
});


// Прочие инициализации
$(function() {


	// Карусель фотографий
	$('.b-gallery UL').each(function() {
		$(this).jcarousel({
			wrap: $(this).find('LI').length>4 ? 'circular' : null
		});
		$(this).find('A').hover(
				function() {
					$(this).parent().find('.desc').stop(true, true).slideDown(200);
				},
				function() {
					$(this).parent().find('.desc').stop(true, true).slideUp(200);
				}
		)
	});


	// fancybox
	$('.js-fancybox').fancybox();


	// Асинхронная загрузка виджетов соцсетей
	$.asyncSocialWidgets('set', {vk_app_id: 2926743});
	$.asyncSocialWidgets('init');


	// Плавающий блок в сайдбаре
	var sideFloatBlock = $('.js-sideFloat');
	if (sideFloatBlock.length) {
		var base = $('<div class="js-sideFloatBase" />').insertBefore(sideFloatBlock);
		var wrap = sideFloatBlock.closest('.l-base');
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			var baseOffset = base.offset().top;
			var maxTop = wrap.offset().top + wrap.height() - sideFloatBlock.height() - baseOffset;
			var top = scroll - baseOffset;
			var fix = (top<=maxTop) && (top>=0);
			if ((top>maxTop) && (sideFloatBlock.css('position')=='fixed')) {
				sideFloatBlock.css('paddingTop', maxTop + 'px');
				sideFloatBlock.stop(true, true).fadeOut(300, function() {
					sideFloatBlock.css('paddingTop', 0);
				});
			}
			if (fix && (sideFloatBlock.css('display')=='none'))
				sideFloatBlock.stop(true, true).fadeIn(300);
			sideFloatBlock.css({
				position: fix ? 'fixed' : 'static',
				top: fix ? 0 : 'auto'
			});
		}).scroll();
	}


	// Вакансии
	$('.b-vacancy_header .title .b-ajaxLink').click(function() {
		var block = $(this).closest('.b-vacancy').find('.b-vacancy_body');
		if (block.css('display')=='none') {
			$('.b-vacancy_body').not(block).stop(true, true).slideUp(300);
			block.slideDown(300);
		} else {
			block.stop(true, true).slideUp(300);
		}
	});


	// Проекты
	$('.b-project').hover(
			function() {
				$('.desc', this).stop(true, true).slideDown(300);
			},
			function() {
				$('.desc', this).stop(true, true).slideUp(300);
			}
	);


});