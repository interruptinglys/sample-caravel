<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
</head>
<style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
<body>
    <table>
        <thead>
            <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach($person as $person)
            @if($person->type == '0')
            <tr>
                <td>{{$person->firstname}} {{$person->type}}</td>
                <td>{{$person->lastname}}</td>
                <td><img src="https://cloud-quiz4.sgp1.digitaloceanspaces.com/{{$person->picture}}" alt=""></td>
            </tr>
            @else
            <tr>
                <td>{{$person->firstname}} {{$person->type}}</td>
                <td>{{$person->lastname}} {{$person->picture}}</td>
                <td><a href="/viewtable/{{$person->id}}" alt="">CLick me</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>