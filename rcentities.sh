## generate entities for all known in bundle
php app/console doctrine:generate:entities EntertainmentRedCarpetBundle 

## Build the database for all known entities
php app/console doctrine:schema:update --force

