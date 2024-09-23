<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DPM</title>

    <style>
        /* Set A4 size */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        @page {
            size: A4 landscape;
            margin: 0;
        }

        @media print {
            .dpm {
                background-color: #3ea534 !important
            }
        }
 
        /* Set content to fill the entire A4 page */
        html,
        body {
            width: 297mm;
            height: 210mm;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
 
        /* Style content with shaded background */
        .content {
            width: 100%;
            /* Adjust the width as needed */
            height: 100%;
            /* Adjust the height as needed*/
            padding: 0px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            /* Light gray shade */
        }
    </style>
</head>
<body style="background-color: bisque">
    <div class="content">
        <!-- Your content goes here -->
        @include('forn_dpm')
    </div>
</body>
</html>