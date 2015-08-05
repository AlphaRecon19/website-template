#/bin/bash

# Get the latest versions of the submodules
git submodule update

# Remove old fonts
rm -rf ../assets/fonts/FontAwesome*
rm -rf ../assets/fonts/fontawesome-webfont*

# Copy the new files
cp ../submodules/Font-Awesome/fonts/* ../assets/fonts/
