<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(97deg, #e3e3e3 2.97%, #eddeb7 120.26%);
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4b5c98;
        }
        .paginate-faq{
            display: flex;
            justify-content: center;
        }
        .faq-container {
            max-width: 900px;
            height: auto;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        h2 {
            color: #0056b3;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Frequently Asked Questions</h1>
   
        @foreach($faqs as $faq) 
        <div class="faq-container">
            <h2>{{ $faq->question }}</h2>
            <p>{{ $faq->answer }}</p>
        </div>
        @endforeach
        <div class="paginate-faq">
            {{ $faqs->links() }}        
        </div>
</body>
</html>