website-template
=================
A website template to grab and start working on, but still very much a work in
progress.
## Librarys used

 - [Smarty Template Engine](http://www.smarty.net)
 - [LESS](http://lesscss.org)
 - [Bootstrap](http://getbootstrap.com)
 - [Font Awesome](https://fortawesome.github.io/Font-Awesome/)

## Compiling LESS files
To compile the less files into css file use these two commands. Note that you
will need to have both the node-less and yui-compressor packages installed to
run them.
```
~ lessc assets/less/style.less > assets/css/style.css
~ yui-compressor -o assets/css/style.css assets/css/style.css
```

(More documentation soon)