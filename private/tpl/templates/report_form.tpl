{include file='form.tpl' form=$form}

<script src="/js/lib/mootools-more-1.4.0.1.js" type="text/javascript"></script>
<script src="/js/date-picker/Locale.en-US.DatePicker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Attach.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Date.js" type="text/javascript"></script>

<link href="/js/date-picker/datepicker_jqui/datepicker_jqui.css" rel="stylesheet">

<script type="text/javascript">
	function updateSelect(selects, opts) {
	    selects.each(function (select) {
			select.empty();
			(new Element('option', { html: '--select item--', disabled: 'disabled' })).inject(select, 'top');
		});

		var select = selects[0];
		var opts = opts[this.options[this.selectedIndex].value];

		if (opts == null || opts == 'undefined') {
			return;
		}

	    opts.each(function(optData) {
	        var opt = new Element('option', {
	        	value: optData.val,
				html: optData.label
			});

			opt.inject(select);
		});
	}

	Array.implement({
	    indexOfFun: function(fn) {
	        for (var i = 0; i < this.length; i++) {
	            if (fn(this[i])) {
	                return i;
				}
			}

			return -1;
		}
	});

	$(window).addEvent('domready', function() {
		var types = {$types|json_encode};
		var orgs = {$orgs|json_encode};
		var persons = {$persons|json_encode};
		var contacts = {$contacts|json_encode};
		var apps = {$apps|json_encode};
		var form = $('report-form');

		var typeSelect = form.getElement('select[name=type]');
		var orgsSelect = form.getElement('select[name=org]');
		var personsSelect = form.getElement('select[name=person]');
		var contactsSelect = form.getElement('select[name=contact]');
		var appSelect = form.getElement('select[name=app]');

		typeSelect.addEvent('change', updateSelect.pass([[orgsSelect, personsSelect, contactsSelect, appSelect], orgs], typeSelect));
		orgsSelect.addEvent('change', updateSelect.pass([[personsSelect, contactsSelect, appSelect], persons], orgsSelect));
		personsSelect.addEvent('change', updateSelect.pass([[contactsSelect], contacts], personsSelect));

		orgsSelect.addEvent('change', function() {
			apps[orgsSelect.value].each(function(appData) {
				var opt = new Element('option', {
					value: appData.val,
					html: appData.html
				});

				opt.inject(appSelect);
			});
		});

		var datePicker = new Picker.Date(form.getElement('input[name=date]'), {
			pickerClass: 'datepicker_jqui',
			useFadeInOut: !Browser.ie,
			format: '%Y-%m-%d'
		});

		{if (isset($date))}
			datePicker.select(new Date({$date->getTimestamp() * 1000}));
		{/if}

		types.each(function (item, arr, index) { (new Element('option', { value: item.val, text: item.label })).inject(typeSelect); });
		{if ($form->get('type') != null)}
			typeSelect.selectedIndex = types.indexOfFun(function (t) { return t.val == {$form->get('type')}; } );
		{/if}
		typeSelect.fireEvent('change');

		{if ($form->get('org') != null)}
		    orgsSelect.selectedIndex = orgs[{$form->get('type')}].indexOfFun(function (org) { return org.val == {$form->get('org')}; }) + 1;
			orgsSelect.fireEvent('change');
		{/if}

		{if ($form->get('app') != null)}
			appSelect.selectedIndex = apps[{$form->get('org')}].indexOfFun(function (app) { return app.val == {$form->get('app')}; }) + 1;
		{/if}

		{if ($form->get('person') != null)}
			personsSelect.selectedIndex = persons[{$form->get('org')}].indexOfFun(function (person) { return person.val == {$form->get('person')}; }) + 1;
			personsSelect.fireEvent('change');
		{/if}

		{if ($form->get('contact') != null)}
			contactsSelect.selectedIndex = contacts[{$form->get('person')}].indexOfFun(function (contact) { return contact.val == {$form->get('contact')}; }) + 1;
		{/if}
	});
</script>