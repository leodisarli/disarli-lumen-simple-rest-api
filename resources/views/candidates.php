<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Eduzz - Candidates</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main-style.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="<?php echo url('/');?>">Eduzz</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo url('/');?>"
                                >Candidates <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Other</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                    <h2>Candidates</h2>
                    <button type="button" class="btn btn-primary breath" data-toggle="modal" data-target="#addModal">
                        Add Candidate
                    </button>
                    <div class="loading text-center">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    </div>
                    <div class="table-responsive candidatesList">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>name</th>
                                    <th>age</th>
                                    <th>updated</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody id="listContent">
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
            aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add candidate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addName">Name</label>
                            <input type="text" class="form-control" id="addName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="addAge">Age</label>
                            <input type="number" class="form-control" id="addAge" placeholder="Age" min="1" max="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary addButton">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit candidate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="editLoading text-center">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        </div>
                        <div class="editData">
                            <input type="hidden" id="editId">
                            <div class="form-group">
                                <label for="editName">Name</label>
                                <input type="text" class="form-control" id="editName" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="editAge">Age</label>
                                <input type="number" class="form-control" id="editAge"
                                    placeholder="Age" min="1" max="100">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary editButton">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog"
            aria-labelledby="delModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">
                            Delete candidate
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delId">
                        Confirm the removal of candidate
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger delButton">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            function loadCandidates() {
                $('.candidatesList').hide();
                $('#listContent').html('');
                $.ajax({
                    type: 'GET',
                    url: '<?php echo url('api/v1/candidates');?>',
                    dataType: 'JSON',
                    beforeSend: function( xhr ) {
                        $('.loading').show();
                    }
                }).done(function (data) {
                    $.each( data, function( key, value ) {
                        $('#listContent').append(
                            "<tr>"+
                                '<td>'+value.id+'</td>'+
                                '<td>'+value.name+'</td>'+
                                '<td>'+value.age+'</td>'+
                                '<td>'+value.updated_at+'</td>'+
                                '<td>'+
                                    '<button type="button" class="btn btn-primary editModal"'
                                        'data-toggle="modal" data-target="#editModal" data-id="'+value.id+'">'+
                                        '<i class="fa fa-pencil"></i>'+
                                    '</button>'+
                                    '&nbsp;'+
                                    '<button type="button" class="btn btn-primary delModal"'+
                                        ' data-toggle="modal" data-target="#delModal" data-id="'+value.id+'">'+
                                        '<i class="fa fa-trash"></i>'+
                                    '</button>'+
                                '</td>'+
                            '</tr>'
                        );
                    });
                    $('.loading').hide();
                    $('.candidatesList').show();
                }).fail(function () {
                    alert('An error ocours');
                });
            }

            $(document).on("click", ".editModal", function () {
                var editId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '<?php echo url('api/v1/candidates');?>/' + editId,
                    dataType: 'JSON',
                    beforeSend: function( xhr ) {
                        $('.editLoading').show();
                    }
                }).done(function (data) {
                    $('#editId').val(editId);
                    $('#editName').val(data.name);
                    $('#editAge').val(data.age);
                    $('.editLoading').hide();
                    $('.editData').show();
                }).fail(function () {
                    alert('An error ocours');
                });
                
            });

            $(document).on("click", ".delModal", function () {
                $('#delId').val($(this).data('id'));
            });

            $(document).on("click", ".addButton", function () {
                var name = $('#addName').val();
                var age = $('#addAge').val();
                if (name == '') {
                    alert('Please type a name');
                    return false;
                }
                if (age == '') {
                    alert('Please type an age');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '<?php echo url('api/v1/candidates');?>',
                    dataType: 'JSON',
                    data: {
                        'name' : name,
                        'age' : age,
                    }
                }).done(function (data) {
                    $('#addModal').modal('toggle');
                    loadCandidates();
                }).fail(function () {
                    alert('An error ocours');
                });
            });

            $(document).on("click", ".editButton", function () {
                var id = $('#editId').val();
                var name = $('#editName').val();
                var age = $('#editAge').val();
                $.ajax({
                    type: 'PUT',
                    url: '<?php echo url('api/v1/candidates');?>/'+id,
                    dataType: 'JSON',
                    data: {
                        'name' : name,
                        'age' : age,
                    }
                }).done(function (data) {
                    $('#editModal').modal('toggle');
                    loadCandidates();
                }).fail(function () {
                    alert('An error ocours');
                });
            });

            $(document).on("click", ".delButton", function () {
                var id = $('#delId').val();
                $.ajax({
                    type: 'DELETE',
                    url: '<?php echo url('api/v1/candidates');?>/'+id,
                    dataType: 'JSON'
                }).done(function (data) {
                    $('#delModal').modal('toggle');
                    loadCandidates();
                }).fail(function () {
                    alert('An error ocours');
                });
            });

            $(document).ready(function() {
                loadCandidates()
            });
        </script>
    </body>
</html>
