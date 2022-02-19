<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css" />
    <title>Chinese Zodiac</title>
</head>
<body>
    <header>
        <?php include("Includes/inc_header.php"); ?>
    </header>
    <main>
        <section id="buttonSection">
            <?php include("Includes/inc_button_nav.php"); ?>
        </section>
        <section id="dynamicContentSection">
            <?php
include("Includes/inc_site_counter.php");

if(isset($_GET["page"])) {
    switch($_GET["page"]) {
        case "site_layout":
            include("Includes/inc_site_layout.php");
            break;
        case "control_structures":
            include("Includes/inc_control_structures.php");
            break;
        case "string_functions":
            include("Includes/inc_string_functions.php");
            break;
        case "web_forms":
            include("Includes/inc_web_forms.php");
            break;
        case "midterm_assessment":
            include("Includes/inc_midterm_assessment.php");
            break;
        case "state_information":
            include("Includes/inc_state_information.php");
            break;
        case "final_project":
            include("Includes/inc_final_project.php");
            break;
        case "home_page":
        default:
            include("Includes/inc_home.php");
            break;
    }
}
else {
    include("Includes/inc_home.php");
}
            ?>
        </section>
    </main>
</body>
<footer>
    <?php include("Includes/inc_footer.php"); ?>
</footer>
</html>