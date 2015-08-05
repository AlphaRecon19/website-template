#/bin/bash

# Check for the commands we need
echo "Checking for dependencies"
## Check for less
if which lessc >/dev/null; then
    echo "Lessc is installed and available"
else
    echo "I require lessc but it's not installed. Install it with 'sudo apt-get install node-less'" >&2; exit 1;
fi

## Check for yui-compressor
if which yui-compressor >/dev/null; then
    echo "yui-compressor is installed and available"
else
    echo "I require lessc but it's not installed. Install it with 'sudo apt-get install yui-compressor'" >&2; exit 1;
fi

echo "Compiling less files ..."
lessc ../assets/less/style.less > ../assets/css/style.css
echo "Compiling less files Done"

echo "Compressing css file ..."
yui-compressor ../assets/css/style.css -o ../assets/css/style.min.css
echo "Compressing css file Done"
