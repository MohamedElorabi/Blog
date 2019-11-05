TinyMCE-FileManager
=================

Summary
------------
FileManager for TinyMCE is a plugin which utilizes jQuery to offer a simple media upload and managing solution within tinyMCE v.4.x.

This plugin automatically creates thumbnails for previewing images while browsing. It is also capable of resizing the images on upload, configurable in config.php.

A note about the original vs. this fork
-------------------------------------------------
Tr1pp0 moved development of the original to https://github.com/trippo/ResponsiveFilemanager in version 8. This is just a repository for my own set of changes made back in version 6, finally free from corporate restrictions. 

License 
-----------
This version is still licensed under The MIT License (MIT):
********************************************************************************
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
********************************************************************************


Use with TinyMCE 4.x
------------------------------
###Quick Start###
* Edit _filemanager/config.php_. For details about the configurations, check the comments in the file itself.
* Upload each of the plugin folders (images, link, media and filemanager) to your tinymce installations plugins folder
* Create the folders for uploads and thumbnails which you specified in _config.php_. Make sure these directories are readable _and_ writable by the web server.
* Test your configuration. Make sure to add filemanager to your list of plugins!

###Sample TinyMCE Configuration###
```
 <script type="text/javascript">
tinymce.init({
    selector: "textarea",
    subfolder:"",
    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste filemanager"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    
    // ===========================================
    // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
    // ===========================================
    relative_urls: false,
    image_advtab: true
});
</script>
```


Use as a stand-alone filemanager
---------------------------------------------------------
The Filemanager works regardless of who calls it. With a few differences, you can open filemanager from iframes, popout windows and other such methods

###Quick Start###
Use the following url where every you would like to call the file manager
    /path/to/filemanager/dialog.php?type=0&editor=mce_0&lang=eng&fldr=&popup=0

###Details###
The main workhorse of the filemanager is _dialog.php_. By passing different GET variables, we can change some of its' actions.
* type
   * 0 = Plain Filemanager
   * 1 = Image Select
   * 2 = File Select
   * 3 = Video Select
   * **NOTE:** Types 1-3 require field_id as well
* editor
  * TODO: Figure out what the editor variable does
* lang
  * Specifies a language to use for the tooltips and such
* fldr
  * Short for "Folder." Specifies which directory to start in. Usually blank to signify the top level of whichever directory was specified in _config.php_
* field_id
  * The id of the field to place the select image's path into. 
* popup
  * Specify 1 if you would like the filemanager to popup in a new window. You may omit this variable otherwise, or set it to 0.

###Sample Fancybox Configuration
```
$('.iframe-btn').fancybox({	
  'width'         : 900,
  'height'        : 600,
  'type'           : 'iframe',
  'autoScale'  : false
});
--------
<a href="js/tinymce/plugins/filemanager/dialog.php?type=0&editor=mce_0&lang=eng&fldr=" class="btn iframe-btn" type="button">Open Filemanager</a>
```
By default, the filemanager is configured to use fanybox. If you choose another method, make sure to update the close function in _filemanager/js/include.js_ to close the windows after a file is selected:

```
function close_window() {
    parent.$.fancybox.close();
}
```

Stuff from the original readme
----------------------------------------
###Old Changelogs
#####Version 6.2.0
- Improve quality of images resizing using PHP Image Magician

#####Version 6.1.1
- Automatic compatibility with popup by pass the popup GET variable

#####Version 6.1.0
- Compatibility with Internet Explorer and old browser
- Fix delete bug
- Improve security

#####Version 6.0.1
- Improve Responsive design

#####Version 6.0.0
- New amazing flat interface
- Possibility to set subfolder as root
- Ajax files and folders cancellation
- Improve speed, code structure and image size optimization
- If image is smaller than thumbnail the file manager show the image centered  
- TinyMCE link_list now is supported and plugin.min.js files aren't minimized [thanks to Pål Schroeder]
- Fix bug in file selection on subfolder and Other bug fix
- Mobile version with swipe event to show options

#####Version 5:
- Stand-alone use of filemanager, you can open and select files also dividing them according to the type (video, images and all files)

#####Version 4:
- Further simplify the installation steps
- Now thumbs folder is inside the file manager script
- Fix resizing bug, create folder possible bug
- AUTOMATIC Realignment of THUMBS tree and images if you upload file from other client FTP or other method
- Add loading animation while the image lightbox loading
- Add possibility to config size width or/and height image limits
- Add possibility to config automatic resizing and set only width or height size
- white background in png thumbs
- fallback upload for old browser
- fix folder delete bug	

#####Version 3:
- With this plugin you can also set automatic resizing of uploaded images.
- Moreover you can set the permits to delete files, folder and create folder.
- This version support advanced tab on image plugin
- For preview img in files list the plugin NOW create a thumbnail image with low resolution!!!
- Simplify the installation steps

###Localization
- BGR [Stanislav Panev]
- BRA [paulomanrique]
- CZE [jlusticky]
- ENG
- FRA
- GER [Oliver Beta]
- HUN [Bende Roland]
- ITA
- NLD [johan12]
- POL [Michell Hoduń]
- POR [Sérgio Lima]
- RUS [vasromand]

Credits
-----------
- Original Creator                 => info@albertoperipolli.com - tr1pp0
- Original Creator until version 1 => mybeeez@gmail.com - b3ez
- Bootstrap                        => http://twitter.github.io/bootstrap/
- Bootstrap Lightbox               => http://jbutz.github.io/bootstrap-lightbox/
- Dropzonejs                       => http://www.dropzonejs.com/
- Fancybox                         => http://fancybox.net/
- TouchSwipe                       => http://labs.rampinteractive.co.uk/touchSwipe/demos/
- PHP Image Magician               => http://phpimagemagician.jarrodoberto.com/‎
