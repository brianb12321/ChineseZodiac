<h1>Web Forms</h1>
<nav class="link-nav">
    <a href="#webForms">Web Forms</a>
    <a href="#alphabetizeSigns">Alphabetizing User Input</a>
    <a href="#imageGallery">Image Gallery</a>
    <a href="#addZodiacFeedback">Add Zodiac Feedback</a>
    <a href="#viewZodiacFeedback">View Zodiac Feedback</a>
</nav>
<h1><a id="webForms">How Does a Web Form Get Processed?</a></h1>
<p>
    There are two parts to a web-form--the client and the server. When the page gets downloaded from the server, the user has a local copy of the page. They can fill out the form without needing to contact
    the server again. Once the user is finished with the form, they must send a POST request back to the server with the content of the filled out form. The server has code to determine whether the request
    is considered a "post-back"--meaning a POST request has been issued. If the request is a postback, the server will read the POST request and handle the data accordingly.
</p>
<h2>Creating a Web-Form</h2>
<p>
    To create a web-form, you first must determine whether the will be an all-in-one or separate. An all-in-one form handles both the postback and rendering the form.
    Once you have decided how to handle user input, create a new PHP file that will either the render the form or process form data.
    In both cases, you must check whether a client request is a postback or not. The $_POST autoglobal should have at least one value set if the request is a postback.
    Use the isset function to determine whether there is a value in the $_POST autoglobal.
</p>
<h1><a id="alphabetizeSigns">Alphabetizing User Input</a></h1>
<p>Allows users to enter in any number of Chinese Zoediac signs and see the result in alphabetical order.</p>
<a href="AlphabetizeSigns.php">[Test the Script]</a>
<a href="ShowSourceCode.php?source_file=AlphabetizeSigns.php">[View the Source Code]</a>

<h1><a id="imageGallery">Image Gallery</a></h1>
<p>See all the beautiful Chinese Zodiac animals!</p>
<a href="ZodiacGallery.php">[Test the Script]</a>
<a href="ShowSourceCode.php?source_file=ZodiacGallery.php">[View the Source Code]</a>

<h1><a id="addZodiacFeedback">Add Zodiac Feedback</a></h1>
<p>Allows users to enter feedback information that will be stored in a MySQL database using mysqli. The server will open a connection, select the chinese_zodiac database, and issue the INSERT INTO command.</p>
<a href="zodiac_feedback.html">[Test the Script]</a>
<a href="ShowSourceCode.php?source_file=process_zodiac_feedback.php">[View the Source Code]</a>

<h1><a id="viewZodiacFeedback">View Zodiac Feedback</a></h1>
<p>Allows users to view all public zodiac feedback submitted using the Add Zodiac Feedback feature. The server will use mysqli to connect to the database, select the chinese_zodiac database, SELECT all fields in the zodiacfeedback table, and remove all records that are not public.</p>
<a href="view_zodiac_feedback.php">[Test the Script]</a>
<a href="ShowSourceCode.php?source_file=view_zodiac_feedback.php">[View the Source Code]</a>