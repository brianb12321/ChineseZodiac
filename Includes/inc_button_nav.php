<?php
include("Includes/inc_banner_display.php");
$Image = $BannerArray[$BannerIndex];
?>

<head>
    <style>
        img {
            border: 0;
        }
    </style>
</head>
<img class="btn" src="<?php echo $Image; ?>" alt="[Banner Ad]" title="Banner Ad" />
<nav id="ButtonNav">
    <a href="index.php?page=home_page">
        <img class="btn" src="Images/HomePage.jpg" alt="[Home Page]" title="Home Page" />
    </a>
    <a href="index.php?page=site_layout">
        <img class="btn" src="Images/SiteLayout.jpg" alt="[Site Layout]" title="Site Layout" />
    </a>
    <a href="index.php?page=control_structures">
        <img class="btn" src="Images/ControlStructures.jpg" alt="[Control Structures]" title="Control Structures" />
    </a>
    <a href="index.php?page=string_functions">
        <img class="btn" src="Images/StringFunctions.jpg" alt="[String Functions]" title="String Functions" />
    </a>
    <a href="index.php?page=web_forms">
        <img class="btn" src="Images/WebForms.jpg" alt="[Web Forms]" title="Web Forms" />
    </a>
    <a href="index.php?page=midterm_assessment">
        <img class="btn" src="Images/MidtermAssessment.jpg" alt="[Midterm Assessment]" title="Midterm Assessment" />
    </a>
    <a href="index.php?page=state_information">
        <img class="btn" src="Images/StateInformation.jpg" alt="[State Information]" title="State Information" />
    </a>
    <a href="index.php?page=final_project">
        <img class="btn" src="Images/FinalProject.jpg" alt="[Final Project]" title="Final Project" />
    </a>
</nav>