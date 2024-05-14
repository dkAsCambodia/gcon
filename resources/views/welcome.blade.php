<!DOCTYPE html>
<html>

<head>
    <title>How To Create Multi Language Website In Laravel - Techsolutionstuff</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="text-align: center;margin-top: 40px;">
            <h2>How To Create Multi Language Website In Laravel - Techsolutionstuff</h2><br>
            <div class="col-md-2 col-md-offset-3 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control Langchange">
                    @forelse ($languages as $language)
                        <option value="{{ $language->code }}"
                            {{ session()->get('locale') == $language->code ? 'selected' : '' }}>
                            {{ $language->name }}
                        </option>
                    @empty
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>
                            English
                        </option>
                        <option value="zh_CN" {{ session()->get('locale') == 'zh_CN' ? 'selected' : '' }}>
                            Chinese
                        </option>
                    @endforelse
                </select>
            </div>
            <h1 style="margin-top: 80px;">{{ __('message.Member Registration') }}</h1>
        </div>

        <h1>
            <ul>
                @forelse ($banners as $banner)
               
                    <li>{{ $banner->image }}{{ $banner->translationValue->GBookingname }} {{ $banner->translationValue->title }} {{ $banner->translationValue->desc }}</li>
                @empty
                    Data Not Found
                @endforelse
            </ul>
        </h1>

    </div>
</body>

<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function() {
        alert($(this).val());
        window.location.href = url + "?lang=" + $(this).val();
    });
</script>

</html>
