website-template
=================
A website template to grab and start working on, but still very much a work in
progress.
# Librarys used

 - [Smarty Template Engine](http://www.smarty.net)
 - [LESS](http://lesscss.org)
 - [Bootstrap](http://getbootstrap.com)
 - [Font Awesome](https://fortawesome.github.io/Font-Awesome/)

## Configuration
The main configuration file is located in the ~/config folder and should be
called main.json. If you are creating a new configuration file, duplicate the
default.json file and rename it main.json. It will then be read by the php
script.
## Compiling LESS files
To compile the less files into css file, run these two commands in the root
of the project. It will then compile and minify the less files into the
"assets/css" folder.

**Note**: that you will need to have both the node-less and yui-compressor
packages installed to run them.
```
~ lessc assets/less/style.less > assets/css/style.css
~ yui-compressor -o assets/css/style.css assets/css/style.css
```
(More documentation soon)