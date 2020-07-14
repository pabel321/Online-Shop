<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
   
<div class="container">
    <h1>Laravel 5.8 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</h1>   
    <input type="text" class="form-control" placeholder="TagName" id="searchname" name="TagName">
</div>
   
<script type="text/javascript">
      $('#searchname').autocomplete({
        source:'{!!URL::route('autocompletesearch')!!}',
          minlength:1,
          autoFocus:true,
          select:function(e,ui)
          {
              $('#searchname').val(ui.item.value);
          }
      });
</script>
   
</body>
</html>