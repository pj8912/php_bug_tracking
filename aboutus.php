<?php

require_once  'vendor/autoload.php';

use BugTracking\Templates\Template;

$template = new Template();

//header
$template->main_header('Home');

if (isset($_SESSION['u_id'])) {
    $template->main_navbar(true);
} else {

    $template->main_navbar(false);
}

?>

<div class="container">
    <h2 class="mt-5 m-2">AboutUs</h2>
    <hr>
    <p class="p-2">This is a bug tracking app</p>
</div>

<?php

$template->main_footer();
?>
