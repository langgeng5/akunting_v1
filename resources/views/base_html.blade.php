<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>
            SISTEM INFORMASI AKUNTANSI - @yield('subtitle', 'Dasboard')
        </title>

        <!-- Custom fonts for this template-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link
            href="{{
                url('startbootstrap-sb-admin-2-templates')
            }}/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />

        <!-- Custom styles for this template-->
        <link
            href="{{
                url('startbootstrap-sb-admin-2-templates')
            }}/css/sb-admin-2.min.css"
            rel="stylesheet"
        />
        <link
            href="{{
                url('startbootstrap-sb-admin-2-templates')
            }}/vendor/datatables/dataTables.bootstrap4.min.css"
            rel="stylesheet"
        />


    </head>

    @yield('layout')
    <!-- Bootstrap core JavaScript-->
    <script src="{{
            url('startbootstrap-sb-admin-2-templates')
        }}/vendor/jquery/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{
            url('startbootstrap-sb-admin-2-templates')
        }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{
            url('startbootstrap-sb-admin-2-templates')
        }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{
            url('startbootstrap-sb-admin-2-templates')
        }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{
        url('startbootstrap-sb-admin-2-templates')
    }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{
        url('startbootstrap-sb-admin-2-templates')
    }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        Inputmask.extendAliases({
            rupiah: {
                "alias" : "numeric",
                "prefix": 'Rp ',
                "groupSeparator": ".",
                "radixPoint": ",",
                "digits": 2,
                'digitsOptional': false,
                "clearMaskOnLostFocus" : true,
                "removeMaskOnSubmit" : true
                }
            });

        $(document).ready(function() {
            $('#btnPrint').click(function() {
                var content = $('#contentLaporan').html();
                var head = $('head').html();

                var newWindow = window.open();
                newWindow.document.write(head);
                newWindow.document.write(content);
                newWindow.document.close();
                newWindow.focus();
                newWindow.print();
                newWindow.close()
            });
        });
    </script>

    @yield('script')
</html>
