<Doctype html>
<html>
<head>
    <link href="{{asset('admin/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/dataTables.min.css')}}" rel="stylesheet">
</head>
<body>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
    </table>
</body>
<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('admin/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/datatables/buttons.print.min.js')}}"></script>
<script >
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</html>