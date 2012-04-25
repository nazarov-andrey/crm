-include myconfig

DB_USER?=root
DB_PASS?=
DB?=italy

dump: scheme data
scheme:
	mysqldump --no-data -u $(DB_USER) -p$(DB_PASS) $(DB) > scheme.sql
data:
	mysqldump --no-create-info --no-create-db -u $(DB_USER) -p$(DB_PASS) $(DB) attachment_type contact_type organization_type > data.sql
restore:
	mysql -u $(DB_USER) -p$(DB_PASS) $(DB) < scheme.sql
	mysql -u $(DB_USER) -p$(DB_PASS) $(DB) < data.sql
