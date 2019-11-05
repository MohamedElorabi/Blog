<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ !empty($title)?$title:'Admin'}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('/') }}/design/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript">
     tinymce.init({

         selector: "textarea#elm1",

         theme: "modern",

         skin: "lightgray",

         language: "en",

         width: 812,
         height: 342,

         resize: false,

         menubar: false,
         subfolder: "",
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
         // ===========================================
         // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
         // ===========================================
         relative_urls: false,
         image_advtab: true,

         toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | link image | fullscreen",

         ptoolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | fullscreen",

         plugins: [
             "advlist autolink lists link image charmap print preview anchor",
             "searchreplace visualblocks code fullscreen",
             "insertdatetime media table contextmenu paste filemanager"
         ],


         content_css: "css/content.css",


         style_formats: [{
                 title: 'Motken Unicode Hor',
                 inline: 'span',
                 styles: {
                     'font-family': 'Motken Unicode Hor'
                 }
             },
             {
                 title: 'Old Antic Bold',
                 inline: 'span',
                 styles: {
                     'font-family': 'Old Antic Bold'
                 }
             },
             {
                 title: 'SC_AMEEN',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_AMEEN'
                 }
             },
             {
                 title: 'SC_DUBAI',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_DUBAI'
                 }
             },
             {
                 title: 'SC_TARABLUS',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_TARABLUS'
                 }
             }
         ]
     });
 </script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
