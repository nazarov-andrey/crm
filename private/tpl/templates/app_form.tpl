{include file='form.tpl' form=$form}

<script src="/js/lib/mootools-more-1.4.0.1.js" type="text/javascript"></script>
<script src="/js/date-picker/Locale.en-US.DatePicker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Attach.js" type="text/javascript"></script>
<script src="/js/date-picker/Picker.Date.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/field-injector.js"></script>
<script type="text/javascript" src="/js/attachment.js"></script>

<link href="/js/date-picker/datepicker_jqui/datepicker_jqui.css" rel="stylesheet">

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		new Picker.Date($('app-form').getElement('input[name=date]'), {
			pickerClass: 'datepicker_jqui',
			useFadeInOut: !Browser.ie
		});

		Attachment.implement({
			getAttachmentsKey: function() {literal}{{/literal}
			return "{$attachment_key}";
			{literal}}{/literal},
		});

		fa = new FieldInjector($('app-form'), 'attachment', Attachment);
		{if isset($attachments)}fa.init({$attachments|json_encode});{/if}
	});
</script>