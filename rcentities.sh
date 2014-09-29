## generate entities for all known in bundle
php app/console doctrine:generate:entities EntertainmentRedCarpetBundle 
php app/console doctrine:generate:entities EntertainmentGuideToTheStarsBundle 
php app/console doctrine:generate:entities EntertainmentArrivalsBundle

## Build the database for all known entities
php app/console doctrine:schema:update --force

