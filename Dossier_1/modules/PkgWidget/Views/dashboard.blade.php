<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widget Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
            font-size: 16px;
        }

        .widget {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .widget h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .widget p {
            font-size: 18px;
            color: #555;
        }

        .widget ul {
            text-align: left;
            list-style-type: none;
            padding-left: 0;
        }

        .widget ul li {
            font-size: 16px;
            color: #555;
            padding: 5px 0;
        }

        .widget p.total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            border: 1px solid #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <div>
        <h1>Widget Result</h1>

        @if(isset($error))
            <div class="error">
                <p>Error: {{ $error }}</p>
            </div>
        @elseif(isset($result))
            <div class="widget">
                <h2>{{ $result['title'] }}</h2>
                @if(isset($result['value']))
                    <!-- Display for a numeric value widget -->
                    <p>{{ $result['value'] }}</p>
                @elseif(isset($result['list']))
                    <!-- Display for a list widget -->
                    <ul>
                        @foreach($result['list'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="total">Total: {{ $result['total'] }}</p>
                @endif
            </div>
        @else
            <p>No result data available.</p>
        @endif

        <br>
        <a href="{{ route('pkgwidget.test') }}">Back to Test Form</a>
    </div>
</body>
</html>
