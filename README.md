MDD WordPress Starter
===

This is a minimal WordPress starter theme for Matt Davis Design that takes care of mundane tasks when starting theme building. It it a tweaked version of _s by Automattic that includes untouched Bootstrap 3 CSS and a few more template files to help in fleshing out themes.

* Bootstrap SCSS included, along with all the components.
* Jumbotron for the front page, Bootstrap navigation walker and Bootstrap media walker for comments.
* Extra post format template files.
* A script at `js/functions.js` to add in Bootstrap classes to WordPreses generated HTML.
* Grunt file and node_modules to make automation easier.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

The first thing you want to do is copy the `MDD-WP-Starter` directory and change the name to something else (like, say, `My-Awesome-Business`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'mdd-wp-starter'` (inside single quotations) to capture the text domain.
2. Search for `mdd_wp_starter_` to capture all the function names.
3. Search for `Text Domain: mdd-wp-starter` in style.css.
4. Search for <code>&nbsp;MDD_WP_Starter</code> (with a space before it) to capture DocBlocks.
5. Search for `mdd-wp-starter-` to capture prefixed handles.

OR

* Search for: `'mdd-wp-starter'` and replace with: `'my-awesome-business'`
* Search for: `mdd_wp_starter_` and replace with: `my_awesome_business_`
* Search for: `Text Domain: mdd-wp-starter` and replace with: `Text Domain: my-awesome-business` in style.css.
* Search for: <code>&nbsp;MDD_WP_Starter</code> and replace with: <code>&nbsp;My Aweseome Business</code>
* Search for: `mdd-wp-starter-` and replace with: `my-awesome-business-`

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
