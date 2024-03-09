<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion de produits</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
          type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.csss') }}">
    <!-- Google Font: Source Sans Pro -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="hold-transition  layout-fixed">

<div class="wrapper">
    <div class="wrapper">



        <div class="">
            <!-- Content Header (Page header) -->
            <section class=" content-header d-flex flex-row justify-content-center">
                <p>Gestion de Produits </p>

            </section>
            <section class="content-header">
                <div class="container-fluid">
                    @if($message=Session::get('success'))
                        <div class="alert alert-success" role="alert">{{ $message }}</div>
                    @endif
                    @if($message=Session::get('delete'))
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @endif
                    @if($message=Session::get('update'))
                        <div class="alert alert-info" role="alert">{{ $message }}</div>
                    @endif

                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                                class="fa-solid fa-plus"></i>Ajouter un produit
                        </button>


                    </div>



                </div><!-- /.container-fluid -->
            </section>
            <!-- Modal -->
          {{--  @include("rooms.add_room_modal")
            <!-- heritage de modale de l'ajout de client -->--}}
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card  ">

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>

                                <th  class="text-center">
                                    Id de produit
                                </th>
                                <th class="text-center">
                                    Couleur
                                </th>
                                <th class="text-center">
                                   Prix

                                </th>
                                <th class="text-center">
                                    Category

                                </th>
                                <th  class="text-center">
                                    Actions

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)

                                <tr>
                                    <td class="text-center">
                                        {{$product->id}}

                                    </td>


                                    <td class="text-center">
                                        {{$product->color}}

                                    </td>
                                    <td class="text-center">
                                        {{$product->price}} DT

                                    </td>

                                    <td class="project_progress text-center">
                                        {{$product->category->label}}

                                    </td>

                                    <td class="project-actions justify-content-center d-flex ">



                                        <a href="{{route("product.edit",$product)}}" class="btn btn-info btn-sm m-1"><i
                                                class="fas fa-pencil-alt"></i> Modifier</a>
                                        <a href="{{route("product.show",$product)}}"
                                           class="btn btn-primary btn-sm m-1"><i class="fa-solid fa-eye"></i>Voir</a>


                                        <form action="{{ route('product.destroy',$product) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <!-- pour des raison de securité -->
                                            <button type="submit" class="btn btn-danger btn-sm m-1">
                                                <i class="fas fa-trash">
                                                </i>
                                                Supprimer
                                            </button>
                                        </form>


                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                        <div class="m-5  d-flex flex-row justify-content-center  ">
                            <div>{{$products->links()}} </div>

                        </div>
                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product.store') }}" method="POST">
                                        @csrf


                                        <div class="d-flex flex-column">

                                            <div class="form-group p-1">
                                                <label for="exampleInputEmail1">Nom</label>
                                                <input type="text" class="form-control" name="name" required
                                                       aria-describedby="emailHelp">

                                            </div>


                                            <div class="form-group p-1">
                                                <label for="exampleInputPassword1">Couleur</label>
                                                <input type="text" class="form-control" name="color"
                                                >
                                            </div>
                                            <div class="form-group p-1">
                                                <label for="exampleInputPassword1">Prix</label>
                                                <input type="text" class="form-control" name="price"
                                                >
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="inputStatus">Categorie </label>
                                                <select class="form-control custom-select" name="category_id" required>

                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                                                    @endforeach



                                                </select>

                                            </div>
                                        </div>


















                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-success">Confirmer</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
</div>



<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="https://kit.fontawesome.com/b18ad5da87.js" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
</script>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideD(500, function() {
            $(this).hide();
        });
    }, 2500);
</script>



</body>

</html>
