To add the header and footer into your file. Follow the instructions

Things Required: Basic knowledge of directory path (absolute vs relative)

1) At the end of your body tag insert this line of coded
    <script src="../../Navbar/navbar.js" abspath="../../"></script>

2) src tag must have the relative location of the navbar.js from the file you are including
    So for example, if the you are including it in aisle1.html
    and you directory tree looks like this : "/Aisle/Aisle1/aisle1.html"
    So you are 2 subfolders down, so you are relative path will be "../../Navbar/navbar.js"

3) the abspath must have the value of parent directory.
    So if you are 3 subfolders down from the parent directory
    abspath = "../../../"
