<?php

require_once '../vendor/autoload.php';

use BugTracking\Models\User;
use BugTracking\Database\Database;
use BugTracking\Templates\Template;
use BugTracking\Config\Config;
use Dotenv\Dotenv;


echo "database ".Database::test();
echo PHP_EOL;
echo User::test();

echo PHP_EOL;
echo Template::test().PHP_EOL;
// echo Config::$dbhost;
?>



<script>
    console.log("<?php echo Config::$home;?>/assets/js/");
</script>
