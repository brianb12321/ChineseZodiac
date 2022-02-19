<h1>Dynamic Web Template</h1>
<h2>What Is a Dynamic Web Template (DWT)</h1>
<p>
    A DWT is a section of a page that can be updated "dynamically" without having to change the source files or duplicating a site layout.<br/>
    Consider a page that has a header, footer, left navigation-bar, and main-body. Naturally, you would expect the header, footer, and nav-bar to be the same across pages.
    Without a DWT, a web-developer would have to copy the HTML for these elements for each page. This breaks DRY (Don't Repeat Yourself) principles.
</p>
<h2>Dynamic Web Templates to The Rescue!</h2>
<p>
    You as the developer can create the skeleton for your page and only have to change the content area. PHP will automatically change the content when rendering the page!</br>
    Here's how it works:
    <ol>
        <li>Create the skeleton (boilerplate)</li>
        <li>Create a PHP file for each content page you wish to inject</li>
        <li>On the skeleton page, add a tag that will be placeholder for PHP to inject.</li>
        <li>Based on a condition, use the include function to inject the PHP file.</li>
    </ol>
</p>
<p>
    For example, here is a demo DWT that has a static header, footer, nav-bar, and a DWT content area.
</p>
<pre>
&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
    &lt;title&gt;Example DWT&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
   &lt;header&gt;
      &lt;h1&gt;This is a header&lt;/h1&gt;
   &lt;/header&gt;
   &lt;main&gt;
      &lt;?php include(&quot;dwt_contentarea.php&quot;); ?&gt;
   &lt;/main&gt;
&lt;/body&gt;
&lt;footer&gt;
   &lt;p&gt;This is a footer&lt;/p&gt;
&lt;/footer&gt;
&lt;/html&gt;
</pre>
<p>This is where the magic occurs. The following code will be injected into the body tag of the skeleton:</p>
<pre>
&lt;p&gt;This is a DWT&lt;/p&gt;
</pre>