@inject('personnel_repository', 'App\Http\Controllers\Repositories\PersonnelRepository')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
            color-adjust: exact !important;                 /*Firefox*/
        }
        #base-image {
            width :9cm;
            height : 13cm;
        }
        .base {
            background : url('/storage/id_template/plain_blank_2.png') center center;
            background-repeat: no-repeat;
            background-size:contain;
            width: auto;
        }
        .border-color {
            border-color: #5F23D1;
        }

        .person_name {
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            font-weight: bold;
        }

        @media print {
            #base-image {
                width :9cm;
                height : 13cm;
            }
        }
    </style>
</head>
<body>
    <div class="flex base" id="base-image">
        <div class="m-auto">
            <img id="qr-image" class="img-fit mt-20 mx-auto w-32 h-32 rounded border-4 border-color shadow p-1 bg-white" src="{{ asset('/storage/images/test-qr.png') }}">

            <img id="person_image" class="w-24 h-24 mt-3 img-fit mx-auto rounded border-4 border-color border-white border-2 shadow p-1 mt-1 bg-white" src="{{ asset('/storage/images/' . $person->image) }}">
            
            <p class="person_name  font-medium mt-3  text-center mt-1 text-white">{{ $person->firstname }} {{ $person->middlename[0] }}. {{ $person->lastname }} {{ $person->suffix }}</p>
        </div>
    </div>
    <script>
        (function () {
            window.print();
        })();
    </script>
</body>
</html>