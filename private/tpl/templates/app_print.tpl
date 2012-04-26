<div class="app-print">
<h1>Request #{$app->getId()}</h1>
<div class="form-field">
	<div class="form-field-label">Client</div>
	<div class="form-field-val">{$app->getClient()->getName()}</div>
</div>
<div class="form-field">
	<div class="form-field-label">Supplier</div>
	<div class="form-field-val">{$app->getSupplier()->getName()}</div>
</div>
<div class="form-field">
	<div class="form-field-label">Date</div>
	<div class="form-field-val">{$app->getDate()->format('d/m/Y')}</div>
</div>
<div class="form-field">
	<div class="form-field-label">Comment</div>
	<div class="form-field-val">{$app->getComment()|nl2br}</div>
</div>
</div>