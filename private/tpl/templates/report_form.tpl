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

	    opts[this.options[this.selectedIndex].value].each(function(optData) {
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
		var form = $('report-form');

		var typeSelect = form.getElement('select[name=type]');
		var orgsSelect = form.getElement('select[name=org]');
		var personsSelect = form.getElement('select[name=person]');
		var contactsSelect = form.getElement('select[name=contact]');

		typeSelect.addEvent('change', updateSelect.pass([[orgsSelect, personsSelect, contactsSelect], orgs], typeSelect));
		orgsSelect.addEvent('change', updateSelect.pass([[personsSelect, contactsSelect], persons], orgsSelect));
		personsSelect.addEvent('change', updateSelect.pass([[contactsSelect], contacts], personsSelect));

		new Picker.Date(form.getElement('input[name=date]'), {
			pickerClass: 'datepicker_jqui',
			useFadeInOut: !Browser.ie
		});

		typeSelect.fireEvent('change');

		{if ($form->getVal('org') != null)}
		    orgsSelect.selectedIndex = orgs[{$form->getVal('type')}].indexOfFun(function (org) { return org.val == {$form->getVal('org')}; }) + 1;
			orgsSelect.fireEvent('change');
		{/if}

		{if ($form->getVal('person') != null)}
			personsSelect.selectedIndex = persons[{$form->getVal('org')}].indexOfFun(function (person) { return person.val == {$form->getVal('person')}; }) + 1;
			personsSelect.fireEvent('change');
		{/if}

		{if ($form->getVal('contact') != null)}
			contactsSelect.selectedIndex = contacts[{$form->getVal('person')}].indexOfFun(function (contact) { return contact.val == {$form->getVal('contact')}; }) + 1;
		{/if}
	});
</script>