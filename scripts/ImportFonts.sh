#/bin/bash

# Get the latest versions of the submodules
git submodule update

# Remove old fonts

## FontAwesome
rm -rf ../assets/fonts/FontAwesome*
rm -rf ../assets/fonts/fontawesome-webfont*

## elegant-icons
rm -rf ../assets/fonts/elegant-icons*


# Copy the new files
## FontAwesome
cp ../submodules/Font-Awesome/fonts/* ../assets/fonts/

## elegant-icons
cp ../submodules/elegant-icons/fonts/* ../assets/fonts/
