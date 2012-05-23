{include file='form.tpl' form=$form}

<script src="/js/lib/mootools-more-1.4.0.1.js" type="text/javascript"></script>
<script src="/js/date-picker/Locale.en-US.DatePicker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Attach.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Date.js" type="text/javascript"></script>
<script src="/js/selects-utils.js" type="text/javascript"></script>

<link href="/js/date-picker/datepicker_jqui/datepicker_jqui.css" rel="stylesheet">

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var form = $('offer-form');
		var apps = {$apps|json_encode};

		var orgsSelect = form.getElement('select[name=org]');
		var appSelect = form.getElement('select[name=app]');

		orgsSelect.addEvent('change', updateSelect.pass([[appSelect], apps], orgsSelect));
	{if ($form->get('org') != null)}
		orgsSelect.selectedIndex = orgsSelect.getElements('option').indexOfFun(function (opt) { return opt.value == "{$form->get('org')}"; });
	{/if}
		orgsSelect.fireEvent('change');

	{if ($form->get('app') != null)}
		appSelect.selectedIndex = apps[{$form->get('org')}].indexOfFun(function (app) { return app.val == {$form->get('app')}; }) + 1;
	{/if}

		var datePicker = new Picker.Date(form.getElement('input[name=date]'), {
			pickerClass: 'datepicker_jqui',
			useFadeInOut: !Browser.ie,
			format: '%Y-%m-%d'
		});
	});
</script>