<h1 class="list">Persons</h1>
Filter by organization:<select id="filter"><option>any</option>{foreach $orgs as $i => $org}
{if ($i == 0 || $orgs[$i - 1]->getType() != $org->getType())}
<option disabled="disabled">{$org->getType()->getCode()}s:</option>
{/if}
<option{if ($org->getId() == $orgId)} selected="selected"{/if} value="{$org->getId()}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$org->getName()}</option>
{/foreach}</select>


<table class="tbl">
	<tr>
		<th class="person-tbl-name">Name</th>
		<th class="person-tbl-org">Organization</th>
		<th class="person-tbl-pos">Position</th>
		<th class="person-tbl-contact">Contacts</th>
		<th class="person-tbl-comment">Comment</th>
		<th class="acts">Actions</th>
	</tr>
{foreach $persons as $i => $person}
	<tr>
		<td class="person-tbl-name">{$person->getName()}</td>
		<td class="person-tbl-org">{$person->getOrganization()->getName()}</td>
		<td class="person-tbl-pos">{$person->getPosition()}</td>
		{*<td class="person-tbl-contact-type">{foreach $person->getContacts() as $contact}{$contact->getType()->getCode()}:<br/>{/foreach}</td>*}
		<td class="person-tbl-type">
			{foreach $person->getContacts() as $contact}
				{$contact->getType()->getCode()}:&nbsp;{if $contact->getType()->getCode() == 'mail'}<a href="mailto:{$contact->getValue()}">{$contact->getValue()}</a>{else}{$contact->getValue()}{/if}<br/>
			{/foreach}
		</td>
		<td class="person-tbl-comment">{$person->getComment()}</td>
		<td class="acts">
			<a href="/?action=edit_person&id={$person->getId()}">modify</a><br />
			{if $smarty.session.super}<a href="/?action=remove_person&id={$person->getId()}">delete</a>{/if}
		</td>
	</tr>
{/foreach}
</table>

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var filter = $('filter');
		filter.addEvent('change', function() {
			var org = filter.options[filter.selectedIndex].value;
			window.location = '/?action=persons_list' + (org ? '&org=' + org : '');
		});
	});
</script>