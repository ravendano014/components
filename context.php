<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="metro/css/metro-all.css?ver=@@b-version" rel="stylesheet">
    <link id="color-scheme" href="metro/css/schemes/custom.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<header data-role="html-container" data-insert-mode="replace" data-html-source="header.html"></header>

<div data-role="html-container" data-insert-mode="replace" data-html-source="sidebar-menu.html"></div>

<div class="container-fluid docs-content">


            <div class="d-none d-block-xl cell-xl-2 order-2 border-left bd-light toc-wrapper">
                <h5>Table of contents</h5>
                <hr/>
                <ul class="toc-nav">
                    <li class="toc-entry"><a href="#">Input control</a></li>
                    <li class="toc-entry"><a href="#_input_about">About</a></li>
                    <li class="toc-entry"><a href="#_input_prepend">Prepend data</a></li>
                    <li class="toc-entry"><a href="#_input_append">Append data</a></li>
                    <li class="toc-entry"><a href="#_input_clear">Clear button</a></li>
                    <li class="toc-entry"><a href="#_input_reveal">Reveal button</a></li>
                    <li class="toc-entry"><a href="#_input_search">Search button</a></li>
                    <li class="toc-entry"><a href="#_input_history">History inputs</a></li>
                    <li class="toc-entry"><a href="#_input_custom_buttons">Custom buttons</a></li>
                    <li class="toc-entry"><a href="#_input_autocomplete">Autocomplete</a></li>
                    <li class="toc-entry"><a href="#_input_options">Options</a></li>
                    <li class="toc-entry"><a href="#_input_events">Events</a></li>
                    <li class="toc-entry"><a href="#_input_methods">Methods</a></li>
                    <li class="toc-entry"><a href="#_input_customize">Customize</a></li>
                    <li class="toc-entry"><a href="#_input_additional_classes">Additional classes</a></li>
                </ul>

            </div>


<a class="button" id="context_toggle">Open context menu</a>
<ul class="d-menu context" data-role="dropdown" data-toggle-element="#context_toggle">
    <li><a href="#"><span class="mif-user icon"></span> Profile</a></li>
    <li><a href="#">Calendar</a></li>
    <li><a href="#">Photo</a></li>
    <li class="divider"></li>
    <li><a href="#"><span class="mif-target icon"></span> Location</a></li>
</ul>

<h3 id="_input_history">History</h3>
                <p>
                    Metro UI input support <code>history</code> feature. To enable it feature, add attribute <code>data-history="true"</code> to input.
                    This enhance the input field that shows you the last input values that has been recently entered.
                    Use the up and down key's to scroll through previously typed input values. Use attribute <code>data-prevent-submit="true"</code> to cancel submitting form when user press <code>Enter</code>.
                </p>
                <div class="example">
                    <input type="text" data-role="input" data-history="true">
                    <p class="text-small">Enter value and press <kbd>Enter</kbd>, repeat, then press <kbd>Up</kbd> or <kbd>Down</kbd> arrows to access entered values.</p>
                </div>
                <pre><code>
                    &lt;input type="text" data-role="input" data-history="true"&gt;
                </code></pre>

                <h3 id="_input_custom_buttons">Custom buttons</h3>
                <p>
                    You can create custom button for input control with attribute <code>data-custom-buttons="..."</code>.
                    To add custom button, first-off - create array with your buttons and add array name as value for attribute <code>data-custom-buttons</code>.
                    This array must be created before input component initiated.
                </p>
                <div class="example">
                    <script>
                        var customButtons = [
                            {
                                html: "<span class='mif-user'></span>",
                                cls: "alert",
                                onclick: "alert('You press user button')"
                            },
                            {
                                html: "<span class='mif-cog'></span>",
                                cls: "warning",
                                onclick: "alert('You press cog button')"
                            }
                        ]
                    </script>

                    <input type="text" data-role="input" data-custom-buttons="customButtons">
                </div>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti maxime vero obcaecati eos nobis animi ipsa illum, aliquam amet voluptatum reprehenderit dolorem saepe maiores. Maxime eaque perspiciatis asperiores quis debitis.</p>
<div class="float-left">Float left on all viewport sizes</div>
<div class="float-right">Float right on all viewport sizes</div>
<div class="float-none">Don't float on all viewport sizes</div>

<div class="float-left-lg float-right-md">
    <div class="multi-action">
        <button class="action-button rotate-minus bg-red fg-white"
                onclick="$(this).toggleClass('active')">
            <span class="icon"><span class="mif-plus"></span></span>
        </button>
        <ul class="actions drop-right">
            <li class="bg-blue"><a href="#"><span class="mif-user-plus"></span></a></li>
            <li class="bg-teal"><a href="#"><span class="mif-library"></span></a></li>
            <li class="bg-pink"><a href="#"><span class="mif-alarm"></span></a></li>
            <li class="bg-orange"><a href="#"><span class="mif-lock"></span></a></li>
        </ul>
    </div>
</div>



</div>

<script src="js/jquery-3.5.1.js"></script>
<script src="metro/js/metro.js?ver=@@b-version"></script>
</body>
</html>